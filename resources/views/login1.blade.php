<html>
   <body>  
      @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif    
      <?php
         echo Form::open(array('url' => 'validation'));
            echo Form::label('Username');
            echo '<br/>';
            echo Form::text('username');
            echo '<br/>';
      

            echo Form::label('Password');
            echo '<br/>';
            echo Form::password('password');
            echo '<br/>';
            
            echo '<br/>';
            echo Form::submit('Click Me!');
         echo Form::close();
      ?>   
   </body>
</html>