<?php
require_once('dbconfig.php');   
      if(isset($_POST["add"]))  
      {  
           if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["email"])
            || empty($_POST["adrss"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else { 
    $query = "INSERT INTO user(firstname, lastname, email, address) values(:fn, :ln,:email, :adr)";
    $stmt = $conn->prepare($query);
    $result =$stmt->execute(
      [ 
        ':fn' => $_POST['fname'], 
        ':ln' => $_POST['lname'],
        ':email' => $_POST['email'],
        ':adr' => $_POST['adrss']
      ]
    );
    if(!empty($result))
    {
        echo "<script>alert('Record inserted successfully')</script>";
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
           <title>Insert Page</title>  
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
                <h3 align="">Insert Page</h3><br />  
                <form method="post">  
                     <label>FirstName</label>  
                     <input type="text" name="fname" class="form-control" />  
                     <br />  
                     <label>LastName</label>  
                     <input type="text" name="lname" class="form-control" />  
                     <br />
                     <label>Email</label>  
                     <input type="email" name="email" class="form-control" />  
                     <br />
                     <label>Address</label>  
                     <input type="text" name="adrss" class="form-control" />  
                     <br />  
                     <input type="submit" name="add" class="btn btn-info" value="Add" />
                     
                     <a href="login.php" onclick="history.back();" class="btn btn-default">Back</a>




                     
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  
