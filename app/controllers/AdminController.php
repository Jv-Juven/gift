<?php

class AdminController extends \BaseController {

	public function getIndex()
	{
		return View::make('admin-login.index');
	}



	public function postIndex()
	{
		$username = Input::get('username');
		$password = Input::get('password');
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