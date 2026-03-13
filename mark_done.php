<?php
include "config.php";

if(isset($_POST['tasks'])){

foreach($_POST['tasks'] as $id){

mysqli_query($conn,"
UPDATE task SET status='done'
WHERE id='$id'
");

}

}

header("Location: index.php");