<?php

namespace App\Jobs;

use App\Models\OtpCode;
use App\Mail\UserOtpCodeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserOtpCodeRegistered implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $otpCode;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(OtpCode $otpCode)
    {
        $this->otpcode = $otpCode;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->otpCode->user)->send(new UserOtpCodeMail($this->otpCode));
    }
}
