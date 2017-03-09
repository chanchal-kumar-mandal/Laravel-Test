<?php
use App\User;

$uid = $uid;
$user = User::find($uid);
?>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>User Application</title>
      <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap-theme.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/admin-style.css')}}"/>
      <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
      <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
      <!--Datepicker CSS And Js files-->

      <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
      <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap-iso.css')}}" />

      <!-- Bootstrap Date-Picker Plugin -->
      <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap-datepicker3.css')}}"/>
      <script type="text/javascript" src="{{URL::asset('assets/js/bootstrap-datepicker.min.js')}}"></script>  
      <!--Custom Js files-->
      <script src="{{URL::asset('assets/js/admin-main.js')}}"></script>
   </head>
   <body>
      <nav role="navigation" class="navbar navbar-inverse">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
               <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
           </div>
           <!-- Collection of nav links and other content for toggling -->
           <div id="navbarCollapse" class="collapse navbar-collapse">
            <div class="navbar-header">
                  <a class="navbar-brand" href="{{ URL::to('users')}}">Users</a>
             </div>                    
               <ul class="nav navbar-nav">
                  <li class="active"><a href="{{ URL::to('users')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                 <li><a href="{{ URL::to('add-user')}}"><span class="glyphicon glyphicon-plus"></span> Add User</a></li>
                 <li><a href="{{ URL::to('users')}}"><span class="glyphicon glyphicon-user"></span> View Users</a></li>
             </ul>
             <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  <li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('login')}}">Admin Login</a></li>
                        <li><a href="{{ URL::to('login')}}">Employe Login</a></li>
                  </ul>
                  </li>
             </ul>
           </div>
      </nav>
      <div class="page-container">
         <div class = "col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
               <div class="panel-heading text-center">
                    Edit User : {{$user->name}}
                </div>
                <div class="panel-body">
                @if(Session::has('success'))
                    <div class="success-message">
                        {{Session::get('success')}}
                    </div>
                @endif
                  
                @if (count($errors) > 0)
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
                @endif  

                <?php

                    echo Form::open(array('url' => 'edit-user/submit', 'method' => 'POST', 'role' => 'form'));
                    echo Form::hidden('user_id',$user->id);
                     echo '<div class = "form-group">'.Form::label('Name : ');
                     echo Form::text('name',$user->name,array('placeholder'=>'Enter Name', 'class' => 'form-control'));
                     echo '</div>';

                     echo '<div class = "form-group">'.Form::label('Username : ');
                     echo Form::text('username',$user->username,array('placeholder'=>'Enter Username', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Address : ');
                     echo Form::text('address',$user->address,array('placeholder'=>'Enter Address', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Mobile : ');
                     echo Form::text('mobile',$user->mobile,array('placeholder'=>'Enter Mobile', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Email : ');
                     echo Form::text('email',$user->email,array('placeholder'=>'Enter Email', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Salary : ');
                     echo Form::text('salary',$user->salary,array('placeholder'=>'Enter Salary', 'class' => 'form-control'));
                     echo '</div>';

                     echo Form::label('Date Of Joinning : ').'<div class = "form-group input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>';
                     echo Form::text('dateOfJoinning', date('d-m-Y',strtotime($user->dateOfJoinning)),array('placeholder'=>'Enter Date Of Joinning', 'class' => 'form-control'));
                     echo '</div>';
                     
                     echo '<div class = "form-group">'.Form::label('Choose Role : ');
                     echo Form::select('role', array('' => 'Select Role','Admin' => 'Admin','Developer' => 'Developer','Designer' => 'Designer','HR' => 'HR'), $user->role, array('class' => 'form-control'));
                     echo '</div>';

                     

                     echo '<div class = "form-group text-center">'.Form::button('<i class="glyphicon glyphicon-leaf"></i> Update',array('type' => 'submit','class' => 'btn btn-large btn-success'));
                     echo '</div>';
                  echo Form::close();
               ?>
               </div>
            </div>
         </div>
      </div><!--End Page Container-->  
   
   </div>
      <footer>
         <div class="footer-bottom">Users &copy; All rights reserved.</div>
      </footer>
   </body>
</html>