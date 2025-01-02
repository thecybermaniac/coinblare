<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class CryptoDeposit extends Notification
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
            'subject' => 'Your crypto deposit of '.$this->deposit->amount.' '.$this->deposit->abbr.' has been approved and added to your '.Str::ucfirst($this->deposit->crypto).' wallet',
            'icon' => 'ni ni-arrow-up',
            'color' => 'success'
        ];
    }
}
