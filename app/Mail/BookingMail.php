<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $final_booking;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($final_booking)
    {
        $this->final_booking = $final_booking;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $bookingRequestMailData = $this->final_booking;
        return $this->subject('Booking Verified')
            ->view('mails.booking_request_mail',compact('bookingRequestMailData'));
    }
}
