<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class EventCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Event
     */
    public $event;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return EventCreated
     */
    public function build()
    {
        return $this->view('emails.new_event')
            ->subject("New Event Reported");
    }
}
