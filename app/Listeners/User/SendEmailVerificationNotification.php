<?php

namespace App\Listeners\User;

use App\Services\MailService\MailServiceContract as MailService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailVerificationNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public bool $afterCommit = true;

    public function __construct(private readonly MailService $mailService)
    {
    }

    public function handle($event): void
    {
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
            $this->mailService->sendEmailVerificationNotification($event->user);
        }
    }
}
