<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserGenderEnum;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use Twilio\Rest\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($this->create($request->all())));

        /*$this->guard()->login($user);*/
        /*
        if ($response = $this->registered($request, $user)) {
            return $response;
        }*/

        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $twilio->verify->v2->services(getenv("TWILIO_VERIFICATION_SID"))
            ->verifications
            ->create("+9".$request->input('phone_number'), "sms");

        return redirect()->route('sms.index')->with(['phone_number' => $request->input('phone_number')]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'numeric', 'digits_between:11,13', 'unique:users'],
            'identity_number' => ['required','numeric', 'digits:11', 'unique:users'],
            'gender' => [new Enum(UserGenderEnum::class)]
        ], [
            'enum' => 'The selected :attribute is invalid.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender'],
            'identity_number' => $data['identity_number'],
            'last_login_device' => request()->header('User-Agent'),
            'last_login_ip' => request()->ip(),
        ]);
    }
}
