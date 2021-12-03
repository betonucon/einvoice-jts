<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function credentials(\Illuminate\Http\Request $request)
    {
        if(is_numeric($request->get('email'))){
            return ['username'=>$request->get('email'),'password'=>$request->get('password')];
        }else{
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }
        return $request->only($this->username(), 'password');
    }
    public function programaticallyEmployeeLogin(Request $request, $personnel_no)
    {
        $personnel_no = base64_decode($personnel_no);
        try {
        
        $userlogin = User::where('username', $personnel_no)->first();
        //dd($userlogin);
        if(is_null($userlogin)){
            return redirect('http://sso.krakatau-it.co.id/');
        }else{
            Auth::loginUsingId($userlogin->id);
            return redirect()
            ->route('/');
        }
        
        } catch (ModelNotFoundException $e) {
    
        return redirect('http://sso.krakatau-it.co.id/');
        }

        return $this->sendLoginResponse($request);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
