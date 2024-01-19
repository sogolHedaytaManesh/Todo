<?php

namespace App\Listeners\User;

use App\Services\MailService\MailServiceContract as MailService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendForgotPasswordByEmailNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public bool $afterCommit = true;

    public function __construct(private readonly MailService $mailService)
    {
    }

    public function handle($event): void
    {
        $this->mailService->sendForgotPasswordNotification($event->user);
    }
}
