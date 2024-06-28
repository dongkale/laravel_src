<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
    protected $redirectTo = "/";

    // 비밀번호 재설정 페이지로 이동
    public function showResetForm(Request $request, $token = null)
    {
        return view("auth.passwords.reset")->with([
            "token" => $token,
            "email" => $request->email,
        ]);
    }

    // 비밀번호 재설정 처리
    public function reset(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|confirmed|min:8",
            "token" => "required",
        ]);

        $status = Password::reset(
            $request->only(
                "email",
                "password",
                "password_confirmation",
                "token"
            ),
            function ($user, $password) {
                $user
                    ->forceFill([
                        "password" => bcrypt($password),
                    ])
                    ->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()
                ->route("login")
                ->with("status", __($status))
            : back()->withErrors(["email" => [__($status)]]);
    }
}
