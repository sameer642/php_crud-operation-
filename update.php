<?php
require_once('dbconfig.php');

$userid = intval($_GET['id']);
$sql = "Select firstname, lastname, email, address, id from user where id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([
 ':id' => $userid
]);
$result = $stmt->fetch();

?>






<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Update Page</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                
                <h3 align="">Update Page</h3><br />  
                <form method="post">  
                     <label>FirstName</label>  
                     <input type="text" name="fname" value="<?php echo htmlentities ($result['firstname']);?>"class="form-control" />  
                     <br />  
                     <label>LastName</label>  
                     <input type="text" name="lname" value="<?php echo htmlentities($result['lastname']);?>"class="form-control" />  
                     <br />
                     <label>Email</label>  
                     <input type="email" name="email" value="<?php echo htmlentities($result['email']);?>"class="form-control" />  
                     <br />
                     <label>Address</label>  
                     <input type="text" name="adrss" value="<?php echo htmlentities($result['address']);?>"class="form-control" />  
                     <br />  

                     <input type="submit" name="update" class="btn btn-info" value="Update" />
                     
                     <a href="view.php" onclick="history.back();" class="btn btn-default">Back</a> 
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  


<?php
if(isset($_POST['update']))
{
  $userid = intval($_GET['id']);
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $emailid=$_POST['email'];
  $address=$_POST['adrss'];
  $sql="update user set firstname = :fn, lastname = :ln, email = :email, address=:adr where id = :id";
  $stmt = $conn->prepare($sql);
  $result = $stmt->execute([ 
        ':fn' => $fname, 
        ':ln' => $lname,
        ':email' => $emailid,
        ':adr' => $address,
        ':id' => $userid

      ]);


    if(!empty($result))
    {
        echo ("<script>alert('Updated Successfully')
               window.location.href='view.php';
               </script>");
    }
    else{
      echo "<script>alert('Error record not updated successfully')</script>";

}
}


?>