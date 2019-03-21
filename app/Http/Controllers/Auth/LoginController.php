<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Socialite;
use Hash;

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

  protected $redirectTo = '/';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
  public function redirectToProvider()
  {
    return Socialite::driver('google')->redirect();
  }
  public function handleProviderCallback()
  {
    $user = Socialite::driver('google')->user();
    //User check
    $userCheck = User::where('email', $user->email)->first();
    if($userCheck) {
      $loginUser = $userCheck;
      // si no tiene nombre
      if(empty($loginUser->name)) {
          $loginUser->name = $user->name;
      }
      // si no tiene nombre
      if(empty($loginUser->avatar)) {
          $loginUser->avatar = $user->avatar;
      }
    } else {
      $loginUser = new User;
      $loginUser->email = $user->email;
      $loginUser->name = $user->name;
      $loginUser->username = str_slug($user->name, '.');
      $loginUser->avatar = $user->avatar;
      $loginUser->password = Hash::make(str_random(8));
    }

    $loginUser->save();
    auth()->login($loginUser, true);
    return redirect()->action('UserController@show', $loginUser->username);

  }
}
