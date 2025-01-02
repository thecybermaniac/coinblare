<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Support extends Notification
{
    use Queueable;

    public $subject;
    public $content;

    /**
     * Create a new notification instance.
     */
    public function __construct($subject, $content)
    {

        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->subject($this->subject)->view('customer.email.support', [
            'name' => 'Hi Admin!',
            'subject' => $this->subject,
            'content' => $this->content,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'subject' => 'hello'
        ];
    }
}
