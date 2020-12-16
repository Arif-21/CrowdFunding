<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Events\UserRegisteredEvent;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
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
            'email' => 'required|unique:users,email|email',
            'name'  => 'required',
        ]);

        $request_data = $request->all();
        $user = User::create($request_data);

        $data['user'] = $user;

        event(new UserRegisteredEvent($user));

        return response()->json([
            'response_code' => '00',
            'response_message' => 'User baru berhasil didaftarkan, silahkan cek email untuk melihat kode otp',
            'data' => $data
        ]);
    }
}
