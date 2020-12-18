<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQuxeue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpCodeMail;

class SendEmailOtpCode implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle($event)
    {   
        if ($event->condition == 'register'){
            $pesan = "Kami senang anda telah mendaftar, Anda perlu mengkonfirmasi akun anda.";
        }
        elseif ($event->condition == 'regenerate') {
            $pesan = "Regenerate OTP berhasil, ini kode OTP anda : ";
        }        
        Mail::to($event->user)->send(new SendOtpCodeMail($event->user, $pesan));
    }
}
