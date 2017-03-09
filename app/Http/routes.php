<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('ID/{id}',function($id){
   echo 'ID: '.$id;
});
Route::get('/user/{name?}',function($name = 'Virat'){
   echo "Name: ".$name;
});
Route::resource('employees', 'Users');

Route::get('role',[
   'middleware' => 'Role:editor',
   'uses' => 'TestController@index',
]);

Route::get('terminate',[
   'middleware' => 'terminate',
   'uses' => 'ABCController@index',
]);

Route::resource('my','MyController');

Route::controller('test','ImplicitController');

class MyClass{
   public $foo = 'bar';
}
Route::get('/myclass','ImplicitController@index');

Route::get('/foo/bar','UriController@index');

Route::get('/register',function(){
   return view('register');
});
Route::post('/user/register',array('uses'=>'UserRegistration@postRegister'));

Route::get('/cookie/set','CookieController@setCookie');
Route::get('/cookie/get','CookieController@getCookie');

Route::get('/basic_response', function () {
   return 'Hello World';
});

Route::get('/header',function(){
   return response("Hello", 200)->header('Content-Type', 'text/html');
});

Route::get('/cookie',function(){
   return response("Hello", 200)->header('Content-Type', 'text/html')
      ->withcookie('name','Chanchal Kumar Mandal');
});

Route::get('json',function(){
   return response()->json(['name' => 'Chanchal Kumar Mandal', 'state' => 'Gujarat']);
});

Route::get('/test', function(){
    return view('test');
});

Route::get('/test2', function(){
   return view('test2');
});

Route::get('blade', function () {
   return view('page',array('name' => 'Chanchal Kumar Mandal'));
});

Route::get('/test3', ['as'=>'testing',function(){
   return view('test3');
}]);

Route::get('redirect',function(){
   return redirect()->route('testing');
});

Route::get('rr','RedirectController@index');

Route::get('/redirectcontroller',function(){
   return redirect()->action('RedirectController@index');
});

Route::get('form',function(){
   return view('form');
});

Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');

Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

Route::get('ajax',function(){
   return view('message');
});
Route::get('/getmsg','AjaxController@index');


/*Route::get('/login',function(){
   return view('login');
});
Route::post('/login/check',['as' => 'loginCheck' , 'uses' => 'Auth\AuthController@authenticate']);
*/
Route::get('/add-user',function(){
   return view('add-user');
});
Route::get('/users','UserController@index');
Route::post('/add-user/submit',['as' => 'addUser' , 'uses' => 'UserController@store']);
Route::get('edit-user/{id}',function($id){
   return view('edit-user', array('uid' => $id));
});
Route::post('/edit-user/submit','UserController@update');
Route::get('/delete-user/{id}', 'UserController@delete');
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/employees','Users@index');
