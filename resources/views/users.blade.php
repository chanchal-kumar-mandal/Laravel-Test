<?php
use App\User;
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

		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<td colspan="8" class="bg-primary" >
						<span class="glyphicon glyphicon-list"></span> User List
					</td>
				</tr>				
			</thead>
			<tbody>
				<tr><th>Name</th><th>Address</th><th>Mobile</th><th>Email</th><th>Joining Date</th><th>Salary</th><th>Role</th><th class="text-center">Actions</th></tr>
				<?php 
				$result = App\User::all();
				foreach ($result as $user) {
				    echo '<tr>
				    		<td>'.$user->name.'</td>
				    		<td>'.$user->address.'</td>
				    		<td>'.$user->mobile.'</td>
				    		<td>'.$user->email.'</td>
				    		<td>'.$user->dateOfJoinning.'</td><td>'.$user->salary.' Rs.</td>
				    		<td>'.$user->role.'</td>
				    		<td class="text-center">
				    			<a class="btn-xs btn-warning" href="edit-user/'.$user->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a> 
				    			<a class="btn-xs btn-danger" onclick="checkDelete('.$user->id.')" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i> Delete</a>
				    		</td>
				    	</tr>';
				}
				?>
			</tbody>
		</table>
      </div><!--End Page Container-->  
   
   </div>
      <footer>
         <div class="footer-bottom">Users &copy; All rights reserved.</div>
      </footer>
   </body>
</html>