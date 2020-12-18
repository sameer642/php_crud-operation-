<?php
require_once('dbconfig.php');

if(isset($_REQUEST['id']))
{
$uid=intval($_GET['id']);

$sql = "DELETE FROM user WHERE id=:id";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([
 ':id' => $uid
]);
if(!empty($result))
    {
        echo ("<script>alert('Deleted Successfully')
               window.location.href='view.php';
               </script>");
    }
  

}
?>