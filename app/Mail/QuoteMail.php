<?php

namespace App\Mail;

#use App\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuoteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    #public $quote;

    public function __construct()
    {
        #$this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.quote')
            ->with([
                'quoteTitle' => 'This is a test email',
                'quoteDescription' => 'sent from cut above construction55, hows it going?',
            ]);
    }
}
