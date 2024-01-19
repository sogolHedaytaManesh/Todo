<?php

namespace App\Notifications;

use App\Mail\EmailVerification as MailVerifyEmail;
use App\Models\User;
use App\Services\UrlGeneratorService\UrlGeneratorService;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;

class EmailVerificationNotification extends VerifyEmail
{
    use Queueable;

    private User $user;

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailVerifyEmail
    {
        $this->setUser($notifiable);

        return (new MailVerifyEmail($this->makeDashboardEmailVerificationURL(), $notifiable))
            ->to($notifiable->email);
    }

    private function makeDashboardEmailVerificationURL(): string
    {
        return UrlGeneratorService::generateDashboardVerifyEmailUrl($this->getRequiredInfoForEmailVerification());
    }

    private function getRequiredInfoForEmailVerification(): array
    {
        $linkKeys = [
            'id' => $this->user->getKey(),
            'hash' => sha1($this->user->getEmailForVerification()),
        ];

        $signedRoute = UrlGeneratorService::signUrl(
            UrlGeneratorService::generateDashboardVerifyEmailUrlName(),
            $linkKeys
        );

        [$url, $queryString] = explode('?', $signedRoute);

        return $linkKeys + ['query' => $queryString];
    }
}
