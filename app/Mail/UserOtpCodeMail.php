<?php

namespace App\Mail;

use App\Models\OtpCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserOtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $otp_code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OtpCode $otp_code)
    {
        $this->otpcode = $otp_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
                    ->view('email.send_otp_code')
                    ->with([
                        'otp' => $this->otp_code->otp,
                        'valid_until' => $this->otp_code->valid_until,
                    ]);
    }
}
