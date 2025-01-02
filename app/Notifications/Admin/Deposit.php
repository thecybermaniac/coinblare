<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class Deposit extends Notification
{
    use Queueable;

    public $deposit;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($param, $param2)
    {
        $this->deposit = $param;
        $this->user = $param2;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'subject' => Str::ucfirst($this->user->name).' has made a cash deposit of '.$this->deposit['amount'].' USD',
            'icon' => 'ni ni-arrow-up'
        ];
    }
}
