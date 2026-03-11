<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class PengajuanPadiStatusNotification extends Notification
{
    use Queueable;

    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Pengajuan Padi',
            'message' => 'Pengajuan kamu telah ' . $this->status,
            'status' => $this->status,
            'waktu' => now(),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => 'Pengajuan Padi',
            'message' => 'Pengajuan kamu telah ' . $this->status,
            'status' => $this->status,
            'waktu' => now(),
        ]);
    }
}