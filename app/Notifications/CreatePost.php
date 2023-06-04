<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePost extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $post_id;
    private $post_owner;

    public function __construct($post_id, $post_owner)
    {
        $this->post_id = $post_id;
        $this->post_owner = $post_owner;
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

    public function toArray(object $notifiable): array
    {
        return [
            'post_id'=>$this->post_id,
            'post_owner'=>$this->post_owner,
            // 'post_owner'=>auth()->user()->name,
        ];
    }
}
