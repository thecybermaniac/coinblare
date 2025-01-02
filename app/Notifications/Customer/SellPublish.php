<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellPublish extends Notification
{
    use Queueable;

    public $request;

    /**
     * Create a new notification instance.
     */
    public function __construct($n)
    {
        $this->request = $n;
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
            'subject' => 'Your crypto sale of '.$this->request['sell_amount'].' '.request()->session()->get('crypto_abbr').' for '.$this->request['sell_price'].' USD has been published',
            'icon' => 'ni ni-curve-up-right',
            'color' => 'info'
        ];
    }
}
