<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;
use Illuminate\Foundation\Auth\User;

class TwilioController extends Controller
{
    public function index() {
        return view('auth.smsverify');
    }


    /**
     * @throws ConfigurationException
     * @throws TwilioException
     */
    public function sms_send(Request $request) {
        $number = $request->input('phone_number');
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $verification = $twilio->verify->v2->services(getenv("TWILIO_VERIFICATION_SID"))
            ->verifications
            ->create($number, "sms");

        return response()->json(['data' => $verification->status]);
    }

    /**
     * @throws TwilioException
     * @throws ConfigurationException
     */
    public function sms_verify(Request $request) {
        $code = $request->input('sms_code');

        if($request->input('phone_number')) {
            $prefixNumber = "+9".$request->input('phone_number');
            $number = $request->input('phone_number');
        } else {
            $prefixNumber = "+9".Auth::user()->phone_number;
            $number = Auth::user()->phone_number;
        }

        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $verification_check = $twilio->verify->v2->services(getenv("TWILIO_VERIFICATION_SID"))
            ->verificationChecks
            ->create($code, // code
                ["to" => $prefixNumber]
            );

        if($verification_check->valid) {
            $user = tap(User::where('phone_number', $number))->update(['is_verified' => true]);
            Auth::login($user->first());
            return redirect()->route('index')->with(['message' => 'Phone number verified']);
        }
        return back()->with(['phone_number' => $number, 'error' => 'Invalid verification code entered!']);
    }

    /**
     * @throws ConfigurationException
     * @throws TwilioException
     */
    public function resend_code() {
        $prefixNumber = "+9".Auth::user()->phone_number;

        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $verification = $twilio->verify->v2->services(getenv("TWILIO_VERIFICATION_SID"))
            ->verifications
            ->create($prefixNumber, "sms");

        return response()->json(['data' => $verification->status]);
    }

}
