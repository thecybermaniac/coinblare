<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CryptoDepositDecline extends Notification
{
    use Queueable;

    public $deposit;

    /**
     * Create a new notification instance.
     */
    public function __construct($param)
    {
        $this->deposit = $param;
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
            'subject' => 'Dear Customer, your crypto deposit of '.$this->deposit->amount.' '.$this->deposit->abbr.' was declined. Contact support for more',
            'icon' => 'ni ni-na',
            'color' => 'danger'
        ];
    }
}
