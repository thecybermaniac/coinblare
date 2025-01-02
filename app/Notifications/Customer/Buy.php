<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Buy extends Notification
{
    use Queueable;

    public $price;
    public $qty;
    public $abbr;

    /**
     * Create a new notification instance.
     */
    public function __construct($n)
    {
        $this->price = $n;
        $this->qty = $n;
        $this->abbr = $n;
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
            'subject' => 'You have successfully bought ' . number_format(request()->session()->get('price'), 10) . ' ' . request()->session()->get('abbr') . ' for ' . request()->session()->get('amount') . ' USD',
            'icon' => 'ni ni-bag',
            'color' => 'success'
        ];
    }
}
