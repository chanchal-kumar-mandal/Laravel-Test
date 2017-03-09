<html>
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

      <div class="container">    
         <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">                    
            <div class="panel panel-info" >
               <div class="panel-heading">
                  <div class="panel-title">Sign In</div>
                  <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
      </div>     

           <div style="padding-top:30px" class="panel-body" >
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

               <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

               <?php
               echo Form::open(array('url' => 'login/check', 'method' => 'POST', 'role' => 'form', 'id' => 'loginform', 'class' => 'form-horizontal'));

                  echo '<div style="margin-bottom: 25px" class="input-group">';
                     echo '<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>';
                     echo Form::text('email','',array('placeholder'=>'email', 'class' => 'form-control', 'id' => 'login-email'));
                  echo '</div>';

                  echo '<div style="margin-bottom: 25px" class="input-group">';
                     echo '<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>';
                     echo Form::text('password','',array('placeholder'=>'password ', 'class' => 'form-control', 'id' => 'login-password'));
                  echo '</div>';

                  echo '<div class="input-group">
                     <div class="checkbox">
                        <label>'.
                        Form::checkbox('remember','1',null,array('id' => 'login-remember')).'Remember me
                        </label>
                     </div>
                  </div>';

                  echo '<div style="margin-top:10px" class="form-group">
                     <!-- Button -->

                     <div class="col-sm-12 controls">'.
                        Form::submit('Login', array('id' => 'btn-login', 'class' => 'btn btn-success')).'
                       <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                     </div>
                  </div>';

                  ?><div class="form-group">
                     <div class="col-md-12 control">
                         <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                             Don't have an account! 
                         <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                             Sign Up Here
                         </a>
                         </div>
                     </div>
                  </div>
               <?php

               echo Form::close();
               ?>
               </div>                     
            </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
           <div class="panel panel-info">
               <div class="panel-heading">
                   <div class="panel-title">Sign Up</div>
                   <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
               </div>  
               <div class="panel-body" >
                   <form id="signupform" class="form-horizontal" role="form">
                       
                       <div id="signupalert" style="display:none" class="alert alert-danger">
                           <p>Error:</p>
                           <span></span>
                       </div>
                           
                       
                         
                       <div class="form-group">
                           <label for="email" class="col-md-3 control-label">Email</label>
                           <div class="col-md-9">
                               <input type="text" class="form-control" name="email" placeholder="Email Address">
                           </div>
                       </div>
                           
                       <div class="form-group">
                           <label for="firstname" class="col-md-3 control-label">First Name</label>
                           <div class="col-md-9">
                               <input type="text" class="form-control" name="firstname" placeholder="First Name">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="lastname" class="col-md-3 control-label">Last Name</label>
                           <div class="col-md-9">
                               <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="password" class="col-md-3 control-label">Password</label>
                           <div class="col-md-9">
                               <input type="password" class="form-control" name="passwd" placeholder="Password">
                           </div>
                       </div>
                           
                       <div class="form-group">
                           <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                           <div class="col-md-9">
                               <input type="text" class="form-control" name="icode" placeholder="">
                           </div>
                       </div>

                       <div class="form-group">
                           <!-- Button -->                                        
                           <div class="col-md-offset-3 col-md-9">
                               <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                               <span style="margin-left:8px;">or</span>  
                           </div>
                       </div>
                       
                       <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                           
                           <div class="col-md-offset-3 col-md-9">
                               <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                           </div>                                           
                               
                       </div>
                       
                       
                       
                   </form>
                </div>
           </div>
         </div> 
      </div> 
      <footer>
         <div class="footer-bottom">Users &copy; All rights reserved.</div>
      </footer>  
   </body>

</html>