<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 7/10/19
 * Time: 2:18 PM
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use App\Service\Auth\AuthService;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        session()->forget('user');
        return view('auth.login');
    }

    public function postLogin(LoginPostRequest $request)
    {
        $rawData = $request->all();
        $userAfterLogin = $this->authService->login($rawData);
        if (!$userAfterLogin) {
            return view('auth.login', ['messageNotEmail' => 'Tài khoản chưa tồn tại']);
        }

        $isLoginSuccess = Hash::check($request['password'], $userAfterLogin->password);
        if ($isLoginSuccess) {
            $this->storeUserToSessionServer($userAfterLogin);
            return redirect('/');
        }

        return view('auth.login', ['messageErrorPassword' => 'Mật khẩu của bạn không đúng']);
    }

    public function storeUserToSessionServer($user)
    {
        session()->put('user', $user);
    }
}
