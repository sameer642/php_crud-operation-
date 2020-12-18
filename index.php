<?php
require_once('dbconfig.php');   
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else { 
    $query = "SELECT * FROM user where username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->execute(
      [
        'username' => $_POST['username'], 
        'password' => $_POST['password']
      ]
    );
    $count = $stmt->rowCount();
    if($count > 0)
      {
        $_SESSION['username'] = $_POST['username'];
        header('location:login.php');
      }
      else{
        $message = "<label>Wrong data</label>";
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
                <h3 align="">Login Page</h3><br />  
                <form method="post">  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />
                     <a href = 'register.php' class="btn btn-success">Register</a>



                     
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  
