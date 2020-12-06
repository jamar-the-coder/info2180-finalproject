<?php
require_once "./config.php";


    $q = $_GET["q"];
     $sql = "SELECT Issues.id, Issues.title, Issues.description, Issues.type, Issues.priority, Issues.status, Issues.created, Issues.updated,
      U1.firstname AS creator_firstname,
       U1.lastname AS creator_lastname, 
       U2.firstname AS assigned_to_firstname,
        U2.lastname AS assigned_to_lastname 
          FROM Issues 
          INNER JOIN Users U1 ON Issues.created_by = U1.id
          INNER JOIN Users U2 ON Issues.assigned_to= U2.id 
          WHERE Issues.id=:id";
     $stmt = $conn->prepare($sql);
     

        // $sql = "SELECT customerName FROM Customers WHERE customerName = :name";
        
        $stmt->execute(['id' => $q]);
        $result = $stmt->fetch();
        
        $date_created = date("F d,Y ", strtotime($result["created"])) ."at". date(" g:i A", strtotime($result["created"]));
        $date_updated = date("F d,Y ", strtotime($result["updated"])) ."at". date(" g:i A", strtotime($result["updated"]));
        //["Issues.title"]

?>
    <link rel="stylesheet" type="text/css" href="../styles/issuedetails.css">
    <h1><?php echo $result["title"]?></h1>
<h2>Issue #<?php echo $q?></h2>
<div id="body-detail">
    <div id="leftside">
        <p><?php echo $result["description"]?></p>
        <p><i>Issue Created on
                <?php echo $date_created . " by ". $result["creator_firstname"] ." ". $result["creator_lastname"]?></i>
        </p>
        <p id="Update"><i>Last updated on <?php echo $date_updated?></i></p>
    </div>
    <div id="rightside">
        <div id="sidePanel">
            <h3>Assigned To:</h3>
            <p><?php echo $result["assigned_to_firstname"] ." ". $result["assigned_to_lastname"]?></p>
            <h3>Type:</h3>
            <p><?php echo $result["type"]?></p>
            <h3>Priority:</h3>
            <p><?php echo $result["priority"]?></p>
            <h3>Status:</h3>
            <p><?php echo $result["status"]?></p>
        </div>
        
            <button id = "closed" onClick="ChangeStatus(<?php echo $q?>,'C')">Mark as Closed</button>
            <button id = "progress" onClick="ChangeStatus(<?php echo $q?>, 'P')">Mark in Progress</button>
        
    </div>
</div>
