<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\OtpCode;
use App\Models\User;

class VerificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'otp' => 'required|',
        ]);

        $otpCode = OtpCode::where('otp', $request->otp)->first();
        
        if (!$otpCode)
            return response()->json([
                'response_code' => '01',
                'response_message' => 'otp tidak ditemukan!',
            ],200);

        $now = Carbon::now();

        if ($now > $otpCode->valid_until)
            return response()->json([
                'response_code' => '01',
                'response_message' => 'otp sudah tidak berlaku, silahkan generate ulang otp kode'
            ],200);
        
        $user = User::find($otpCode->user_id);
        $user->email_verified_at = Carbon::now();
        $user->save();

        $otpCode->delete();

        $data['user'] = $user;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'User berhasil di verifikasi',
            'data' => $data,
        ]);
    }
}
