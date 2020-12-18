<!DOCTYPE html>
<html>
<head>  
           <title> Login</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Address</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            

            <?php
                require_once('dbconfig.php');
                if($conn)
                {
                    $query = "SELECT * FROM user";
                    $result  = $conn->query($query);
                    foreach ($result as $row)
                    {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['lastname'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . "<a href='update.php?id=".$row['id']."'"." class='glyphicon glyphicon-pencil btn btn-warning'>Update</a>" . "</td>";
                        echo "<td>" . "<a href='delete.php?id=".$row['id']."'"." class='glyphicon glyphicon-trash btn btn-danger'>Delete</a>" . "</td>";
                        echo "</tr>";
                    }
                }


                else
                {
                    echo $conn;
                }
                ?>
        </tbody>
    </table>

</body>
</html>
