<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('seguridad.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function resetPassword($user, $password)
    {
        //$user->password = Hash::make($password);
        //$user->setRememberToken(Str::random(60));

        $user->password = $password;
        $user->save();

        event(new PasswordReset($user));
        //$this->guard()->login($user);
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return redirect($this->redirectPath())
                            ->with('resetPassword', 'ok');
    }
}
