<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Invite;
use App\Church;

class InviteCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $invite;
    public $church;

    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
        $this->church = Church::find($invite->church_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('users@churchtools.co')
                ->markdown('emails.invite');
    }
}
