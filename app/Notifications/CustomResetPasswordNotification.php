<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class CustomResetPasswordNotification extends ResetPassword
{
    public function toMail($notifiable)
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false)); // Jangan gunakan route absolute ke frontend

        return (new MailMessage)
            ->subject('Reset Password')
            ->line('Kami menerima permintaan reset password untuk akun Anda.')
            ->action('Reset Password', $resetUrl)
            ->line('Jika Anda tidak meminta reset password, abaikan email ini.');
    }
}
