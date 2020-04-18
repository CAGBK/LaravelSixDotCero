<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class RepliedToThread extends Notification
{
    use Queueable;
    public $challengeNotify;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($challengeNotify,$user)
    {
        $this->challengeNotify = $challengeNotify;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'repliedTime'=>Carbon::now(),
            'challenge_id'=>$this->challengeNotify->id,
            'challenge_name'=>$this->challengeNotify->name,
            'user_id'=>$this->user->id,
            'user_name'=>$this->user->name,
            'image'=>$this->user->profile->avatar,
            'status'=>$this->user->profile->avatar_status
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
