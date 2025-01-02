<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellSold extends Notification
{
    use Queueable;

    public $sale;

    /**
     * Create a new notification instance.
     */
    public function __construct($n)
    {
        $this->sale = $n;
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
            'subject' => 'Your sale of '.$this->sale->amount.' '.$this->sale->abbr.' for '.$this->sale->price.' USD has been sold',
            'icon' => 'ni ni-check-thick',
            'color' => 'success'
        ];
    }
}
