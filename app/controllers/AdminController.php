<?php

class AdminController extends \BaseController {

	public function getIndex()
	{
		return View::make('admin-login.index');
	}

  public function statistic()
  {
      $qq = count(User::where('qq_id','!=','null')->get());
      $weixin = count(User::where('unionid','!=','null')->get());
        $s = Statistic::find(1);
      if(isset($s))
      {
          $s->qq      = $qq;
          $s->weixin  = $weixin;
          $s->save();
      }else
      {
          $s = new Statistic;
          $s->qq      = $qq;
          $s->weixin  = $weixin;
          $s->save();
      }

      return true;
  }

	public function postIndex()
	{
		$username = Input::get('username');
		$password = Input::get('password');
    $this->statistic();
  		if (Auth::attempt(['username' => $username, 'password' => $password]))
  		{
  			
  			$admin = Auth::user();
  			$role_id = $admin->role_id;
  			if( $role_id != 3)
  			{
  				return Redirect::back()
     					 ->withInput()
					 ->withErrors('你没有管理员权限！');
  			}
  			 return Redirect::intended('/admin');
  		}
		return Redirect::back()
     					 ->withInput()
					 ->withErrors('密码不正确！');
	}
}