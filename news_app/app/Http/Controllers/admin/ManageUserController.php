<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Validator;

class ManageUserController extends Controller
{

	function showUserList(){

		$user_list = User::orderBy("id", "desc")->paginate(10);

		return view("admin.user_list", [
			"user_list" => $user_list
		]);
	}

	function showUserDetail($id){

		$user = User::find($id);

		return view("admin.user_detail", [
			"user" => $user
		]);

	}

	function update(Request $request, $id){ 

		$user = User::find($id);
		
		$input = $request->only('name', 'email', 'display_name');
		
		$validator = Validator::make($input, [
			'name' => 'required|string|max:30',
			'email' => 'required|string|max:30|email|unique:users,email,'.$user->id,
			'display_name' => 'required|string|max:30|regex:/^[a-z0-9]+/|unique:users,display_name,'.$user->id,
		]);

		//バリデーション失敗
		if($validator->fails()){
			return redirect('admin/user/' . $user->id)
				->withErrors($validator)
				->withInput();
		}
		
		//バリデーション成功
		$user->name = $input["name"];
		$user->email = $input["email"];
		$user->display_name = $input["display_name"];
		$user->save();

		return redirect('admin/user/' . $user->id);

	}

	function showUserCreateForm(){ 
		return view("admin.user_create");
	}

	function create(Request $request){ 

		$input = $request->only('name', 'email', 'display_name', 'password', 'password_confirmation');
		
		$validator = Validator::make($input, [
			'name' => 'required|string|max:30',
			'email' => 'required|string|max:30|email|unique:users,email',
			'password' => 'required|confirmed|string|max:100',
			'display_name' => 'required|string|max:30|regex:/^[a-z0-9]+/|unique:users,display_name',
		]);

		//バリデーション失敗
		if($validator->fails()){
			return redirect('admin/user/create')
				->withErrors($validator)
				->withInput();
		}
		
		//バリデーション成功
		$user = new User();
		$user->name = $input["name"];
		$user->email = $input["email"];
		$user->display_name = $input["display_name"];
		$user->password = bcrypt($input["password"]);
		$user->save();

		return redirect('admin/user/' . $user->id);

	}

}
