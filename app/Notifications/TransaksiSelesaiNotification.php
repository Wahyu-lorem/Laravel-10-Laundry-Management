<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransaksiSelesaiNotification extends Notification
{
    use Queueable;

    protected $transaksi;


    public function __construct($transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Transaksi Anda dengan invoice ' . $this->transaksi->invoice . ' telah selesai. anda bisa menjemputnya sekarang di outlet')
                    ->action('Lihat Transaksi', url('/transaksi/' . $this->transaksi->id))
                    ->line('Terima kasih telah menggunakan layanan kami!');
    }


    public function toArray($notifiable)
    {
        return [
            'transaksi_id' => $this->transaksi->id,
            'invoice' => $this->transaksi->invoice,
            'message' => 'Transaksi Anda dengan invoice ' . $this->transaksi->invoice . ' telah selesai, anda bisa menjemputnya sekarang di outlet.',
        ];
    }
}
