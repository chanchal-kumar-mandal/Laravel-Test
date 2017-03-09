<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events\StudentAdded;
use Event;

class CreateStudentController extends Controller {
   public function insertform(){
      return view('stud_add');
   }
   
   public function insert(Request $request){
      $name = $request->input('stud_name');
      DB::insert('insert into student (name) values(?)',[$name]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/event">Click Here</a> to go back.';
      
      //firing an event
      Event::fire(new StudentAdded($name));
   }
}

