<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\User;

use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {
	//protected $table = "users";

	public function index(){
	  return view('users');
	}

	public function store(Request $request)
	{
		//print_r($request->all());
	    // Validate the request...
	    $this->validate($request, [
	        'name'=>'required',
	        'username'=>'required|max:8',
         	'password'=>'required',
	        'address'=>'required',
         	'mobile'=>'required',
	        'email'=>'required',
         	'salary'=>'required',
	        'dateOfJoinning'=>'required'
	    ]);

	    $user = new User();

	    $user->name = $request->name;	    

	    $user->username = $request->username;

	    $user->password = md5($request->password);

	    $user->address = $request->address;

	    $user->mobile = $request->mobile;

	    $user->email = $request->email;

	    $user->salary = $request->salary;

	    $user->dateOfJoinning = date('Y-m-d',strtotime($request->dateOfJoinning));

	    $user->role = $request->role;

	    $user->save();

	    return Redirect::to('add-user')->with('success', 'User has been successfully added.');
	    
	}

	public function update(Request $request)
	{
		//print_r($request->all());
	    // Validate the request...
	    $this->validate($request, [
	        'name'=>'required',
	        'username'=>'required|max:8',
	        'address'=>'required',
         	'mobile'=>'required',
	        'email'=>'required',
         	'salary'=>'required',
	        'dateOfJoinning'=>'required'
	    ]);

	    $user = User::find($request->user_id);

	    $user->name = $request->name;
	    

	   	$user->username = $request->username;

	    $user->password = md5($request->password);

	    $user->address = $request->address;

	    $user->mobile = $request->mobile;

	    $user->email = $request->email;

	    $user->salary = $request->salary;

	    $user->dateOfJoinning = date('Y-m-d',strtotime($request->dateOfJoinning));

	    $user->role = $request->role;

	    $user->save();

	    return Redirect::to('edit-user/'.$request->user_id)->with('success', 'User has been successfully updated.');
	    
	}
	public function delete($id = 0)
	{
	    $user = User::find($id);

	    $user->delete();

	    return Redirect::to('users')->with('success', 'User has been successfully deleted.');
	    
	}
}
