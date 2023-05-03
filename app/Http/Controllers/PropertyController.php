<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

class PropertyController extends Controller
{
    //

    public function showVerifyPage()
    {
        return view("Verification.verify-otp");
    }

    public function propertyDetailPage()
    {
        return view("property-pages.single-property");
    }

    public function submitAccessRequest(Request $req)
    {

        $validated_data = $req->validate([
            "email1" => "required|email",
            "name1" => "required",
            "phone1" => "required|regex:/^([0-9\s\-\+\(\)]*)$/"
        ], $messages = [
            'email1.required' => 'Email field must not be empty!',
            "email1.email"  => "Email must be a valid email",
            "name1.required" => "name is required",
            "phone1.required" => "Phone can not be empty"
        ]);

        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($validated_data['phone1'], "sms");



        return redirect()->route('verify-otp')->with(['phone_number' => $validated_data['phone1'], "user_data" => json_encode($validated_data)]);
    }



    public function VerifyOTP(Request $req)
    {

        $data = $req->validate([
            'verification_code' => ['required'],
            'phone_number' => ['required'],
        ]);


        $validated_data = (array) json_decode($req->user_data);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        try {
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create(
                    [
                        "code" => $data['verification_code'],
                        'to' => $data['phone_number']
                    ]
                );
        } catch (Exception $e) {
            return back()->with(['phone_number' => $data['phone_number'], "user_data" => json_encode($validated_data), 'error' => 'OTP Expired, Please Go back and Verify Again!']);
        }

        if ($verification->valid) {

            $user = User::where('email', $validated_data['email1'])->first();
            /* Authenticate user */
            // Auth::login($user->first());
            if (!$user) {
                $user = User::create([
                    'name' => $validated_data['name1'],
                    "email" => $validated_data['email1'],
                    'phone_number' => $validated_data['phone1'],
                    'password' => Hash::make($data['verification_code']),
                ]);
            } else {
                $user->update(
                    [
                        "phone_number" => $validated_data['phone1']
                    ]
                );
            }


            $user->update(['isVerified' => true]);

            Cookie::queue("curr_user_verified", true, 36000);
            Cookie::queue("curr_user_phone", $data['phone_number'], 36000);
            Cookie::queue("curr_user", $user, 36000);


            return redirect()->route('property-details')->with(['message' => 'Phone number verified']);
        }


        return back()->with(['phone_number' => $data['phone_number'], "user_data" => json_encode($validated_data), 'error' => 'Invalid verification code entered!']);
    }
}
