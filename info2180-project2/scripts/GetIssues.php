
<?php
session_start();
require_once "./config.php";

$stmt;
if($_GET["q"] == "all"){
    $stmt = $conn->query("SELECT Issues.id, Issues.title, Issues.type,Issues.status, Issues.created, Users.firstname, Users.lastname 
        FROM Issues INNER JOIN Users ON Issues.assigned_to = Users.id ");
}
else if($_GET["q"] == "open"){
    $stmt = $conn->query("SELECT Issues.id, Issues.title, Issues.type,Issues.status, Issues.created, Users.firstname, Users.lastname 
        FROM Issues INNER JOIN Users ON Issues.assigned_to = Users.id
    WHERE Issues.status = 'OPEN'");
}
else{
    $id = $_SESSION['id'];

    $stmt = $conn->query("SELECT Issues.id, Issues.title, Issues.type,Issues.status, Issues.created, Users.firstname, Users.lastname 
        FROM Issues INNER JOIN Users ON Issues.assigned_to = Users.id 
    WHERE assigned_to= $id");

}   


 
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    



?>






    



<table class="table-style-three">
<thead>
<tr>
<th>Title</th>
<th>Type</th>
<th>Status</th>
<th>Assigned To</th>
<th>Created</th>
</tr>
</thead>
<tbody>
<?php foreach ($results as $row): ?>
    <tr onClick = "OpenIssue(<?= $row['id']; ?>)">
      <td>#<?= $row['id']; ?> <?= $row['title']; ?></td>
      <td><?= $row['type']; ?></td>
      <td id = <?= $row['status']; ?>><?= $row['status']; ?></td>
      <td><?= $row["firstname"] ." ". $row["lastname"] ?></td>
      <td><?= date("Y-m-d", strtotime($row["created"])); ?></td>
  </tr>
  <?php endforeach; ?>
</tbody>
  </table>

