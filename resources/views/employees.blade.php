<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
	    @foreach($users as $user)
		    <h3>{{ $user->name }}</h3>
		    <p>{{ $user->role}}</p>
		    <p>
		        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">View user</a>
		        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit user</a>
		    </p>
		    <hr>
		@endforeach
        <form action = "/create" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      
         <table>
            <tr>
               <td>Name</td>
               <td><input type='text' name='name' /></td>
            </tr>
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Add student"/>
               </td>
            </tr>
         </table>
            
      	</form>
    </body>
</html>

        