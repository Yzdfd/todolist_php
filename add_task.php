<?php
include "config.php";

$task = $_POST['task'];

mysqli_query($conn,"
INSERT INTO tasks(task)
VALUES('$task')
");

header("Location: index.php");