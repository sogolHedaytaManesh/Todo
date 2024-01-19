<?php

return [
    'dashboard' => [
        'verify_email_url' => env('APP_URL').'/'.env('DASHBOARD_BASE_URL').'/auth/register/verify-email',
        'verify_email_name' => 'api.v1.auth.register.email-verification',
        'forget_password_by_email_url' => env('APP_URL').'/'.env('DASHBOARD_BASE_URL').'/auth/forgot-password/reset',
        'forget_password_by_email_name' => 'api.v1.auth.forgot-password.reset'
    ],
];
