<?php

namespace App\Notifications;

use App\Mail\ForgotPassword;
use App\Models\User;
use App\Services\UrlGeneratorService\UrlGeneratorService;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;

class ForgotPasswordByEmailNotification extends VerifyEmail
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

    public function toMail($notifiable): ForgotPassword
    {
        $this->setUser($notifiable);

        return (new ForgotPassword($this->makeDashboardForgotPasswordByEmailURL(), $notifiable))
            ->to($notifiable->email);
    }

    private function makeDashboardForgotPasswordByEmailURL(): string
    {
        return UrlGeneratorService::generateDashboardForgotPasswordByEmailUrl(
            $this->getRequiredInfoForForgotPasswordByEmail()
        );
    }

    private function getRequiredInfoForForgotPasswordByEmail(): array
    {
        $linkKeys = [
            'id' => $this->user->getKey(),
            'hash' => sha1($this->user->getEmailForVerification()),
        ];

        $signedRoute = UrlGeneratorService::signUrl(
            UrlGeneratorService::generateDashboardForgotPasswordByName(),
            $linkKeys
        );

        [$url, $queryString] = explode('?', $signedRoute);

        return $linkKeys + ['query' => $queryString];
    }
}
