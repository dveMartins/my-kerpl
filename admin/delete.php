<?php

require_once '../init.php';

//$success_msg = $error_msg = "";

$projects = new Projects();
if(isset($_GET['id'])) {
    $projects->project_id = $_GET['id'];
    $sql = "SELECT * FROM projects WHERE id = $projects->project_id";
    $project = $database->query($sql);
    while($row = mysqli_fetch_array($project)) {
        $projects->image = $row['image'];
    }
    
    if($projects->delete_prj()) {
        $_SESSION['success_msg'] = "Arbeit wurde gelöscht!";
        $projects->redirect("index.php");
        exit();
    } else {
        $_SESSION['error_msg'] = "Es gab einen Fehler! Arbeit wurde nicht gelöscht.";
        $projects->redirect("index.php");
        exit();
    }
}

