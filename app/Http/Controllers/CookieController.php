<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class CookieController extends Controller
{
    public function setCookie(Request $request){
      $minutes = 1;
      $response = new Response('Hello World');
      $response->withCookie(cookie('name', 'Chanchal', $minutes));
      return Cookie::queue('name', 'Chanchal', $minutes);
	}
	public function getCookie(Request $request){
	  $value = $request->cookie('name');
	  echo $value;
	}
}
