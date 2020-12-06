<?php
require_once "./config.php";
    
    
        

      $sql = "UPDATE Issues SET status = :stat, updated = :updat WHERE id = :id";
       $status = "";
       date_default_timezone_set("America/Jamaica");
       $update = date_format(new DateTime(),"Y-m-d H:i:s");
       $id = $_GET["i"];

    
    if($_GET["q"] == "P"){
        $status = "In Progress";

    }
    else if($_GET["q"] == "C"){
        $status = "Closed";
    }

    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(":stat",$status,PDO::PARAM_STR);
    $stmt->bindParam(":updat",$update,PDO::PARAM_STR);
    $stmt->bindParam(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    


?>

<i>Last updated on <?php echo date("F d,Y ", strtotime($update)) ."at". date(" g:i A", strtotime($update));?></i>
