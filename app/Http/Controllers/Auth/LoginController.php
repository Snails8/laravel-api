<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberLoginPostRequest;
use App\Services\UtilityService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/top';


    /**
     * LoginController constructor.
     * @param  Request  $request
     */
    public function __construct(Request $request, UtilityService $utilityService)
    {
        parent::__construct($request, $utilityService);
        $this->middleware('guest')->except('logout');
    }


    /**
     * ログインフォーム
     * @Method GET
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        $title = 'ログイン';

        $data = [
            'title' => $title
        ];

        return view('auth.login', $data);
    }


    /**
     * ログイン処理
     * @Method POST
     * @param  MemberLoginPostRequest  $request
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     * @throws ValidationException
     */
    public function login(MemberLoginPostRequest $request)
    {
        $this->validateLogin($request);

        // ログイン処理
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // 試行回数を記録
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * ログアウト処理
     * @Method GET
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }


    /**
     * Attempt to log the user into the application.
     * @param  MemberLoginPostRequest  $request
     * @return bool
     */
    private function attemptLogin(MemberLoginPostRequest $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }


    /**
     * Get the needed authorization credentials from the request.
     * @param  MemberLoginPostRequest  $request
     * @return array
     */
    private function credentials(MemberLoginPostRequest $request)
    {
        return $request->only('email', 'password');
    }


    /**
     * Send the response after the user was authenticated.
     * @param  MemberLoginPostRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function sendLoginResponse(MemberLoginPostRequest $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->route('top');
    }


    /**
     * @param  MemberLoginPostRequest  $request
     * @throws ValidationException
     */
    private function sendFailedLoginResponse(MemberLoginPostRequest $request)
    {
        throw ValidationException::withMessages([
            'email' => 'メールアドレスかパスワードが間違っています',
        ]);
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    private function guard()
    {
        return Auth::guard('member');
    }
}
