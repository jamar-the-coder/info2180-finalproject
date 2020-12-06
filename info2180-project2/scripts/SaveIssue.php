<?php
include_once 'CreateIssue.php';
session_start();
    $message;
    if ($_POST["Title"] == "" || $_POST["Description"] == ""){
        $message = "Please fill all fields.";
    }
    else{
try{
     $Title = filter_var($_POST["Title"], FILTER_SANITIZE_STRING);
     $Title = htmlentities($Title, ENT_QUOTES, 'UTF-8');
     $Description = filter_var($_POST["Description"], FILTER_SANITIZE_STRING);
     $Description = htmlentities($Description, ENT_QUOTES, 'UTF-8');
     $Type = $_POST["Type"];
     $Priority = $_POST["Priority"];
     $Assigned = $_POST["Assigned"];
     $created_by = $_SESSION["id"];
     date_default_timezone_set("America/Jamaica");
     $Date = date_format( new DateTime(),"Y-m-d H:i:s");
    

    $sql = "INSERT INTO `Issues` (`id`, `title`, `description`, `type`, `priority`, `status`, `assigned_to`, `created_by`, `created`, `updated`) VALUES
    (NULL, ?, ?, ?, ?, 'Open', ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql); 
    if($stmt->execute([$Title, $Description, $Type , $Priority,$Assigned,$created_by, $Date, $Date]))
        $message = "New record created successfully.";
    else
        $message = "Duplicate title.";
    }
catch(PDOException $e)
    {

    	$message = $sql . "<br>" . $e->getMessage();
    }
}






?>

<p><?php echo $message; ?></p>
