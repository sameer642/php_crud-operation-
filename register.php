<?php
require_once('dbconfig.php');   
      if(isset($_POST["register"]))  
      {  
           if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["username"])
            || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else { 
    $query = "INSERT INTO user(firstname, lastname, username, password) values(:fn, :ln,:username, :password)";
    $stmt = $conn->prepare($query);
    $result =$stmt->execute(
      [ 
        ':fn' => $_POST['fname'], 
        ':ln' => $_POST['lname'],
        ':username' => $_POST['username'],
        ':password' => $_POST['password']
      ]
    );
    if(!empty($result))
    {
                                
        echo ("<script>alert('Succesfully Registered')
               window.location.href='index.php';
               </script>");
    }
    
    else{
    	echo "<script>alert('Error record not inserted successfully')</script>";

     }
    
  }
}


?>


<!DOCTYPE html>  
 <html>  
      <head>  
           <title> Login</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h3 align="">Register Page</h3><br />  
                <form method="post">  
                     <label>FirstName</label>  
                     <input type="text" name="fname" class="form-control" />  
                     <br />  
                     <label>LastName</label>  
                     <input type="text" name="lname" class="form-control" />  
                     <br />
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />
                     <label>Password</label>  
                     <input type="text" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="register" class="btn btn-primary" value="Register" />
                     <a href="login.php" onclick="history.back();" class="btn btn-default">Back</a>

                     
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  
