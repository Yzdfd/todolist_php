<?php
include "config.php";

$tasks = mysqli_query($conn,"SELECT * FROM tasks ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Todo App</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wrapper">

<h1>TASKS</h1>

<div class="top-buttons">

<form action="add_task.php" method="POST">
<input name="task" placeholder="New task..." required>
<button class="add">ADD TASK +</button>
</form>

<button class="filter">Filter task ☰</button>

<form method="POST" action="mark_done.php">
<button class="done">Mark Done</button>

</div>


<div class="task-header">

<div class="task-title">TASK</div>

<div class="status-title">Status</div>

</div>


<div class="task-list">

<?php while($t = mysqli_fetch_assoc($tasks)): ?>

<div class="task-row">

<div class="task-left">

<input type="checkbox" name="tasks[]" value="<?= $t['id'] ?>">

<span><?= $t['task'] ?></span>

<div class="task-actions">

<a href="delete_task.php?id=<?= $t['id'] ?>">
<button class="delete">DELETE</button>
</a>

<a href="edit_task.php?id=<?= $t['id'] ?>">
<button class="edit">EDIT</button>
</a>

</div>

</div>

<div class="status
<?php
if($t['status']=="done") echo "green";
elseif($t['status']=="progress") echo "yellow";
else echo "red";
?>
">

<?php
if($t['status']=="done") echo "Finished";
elseif($t['status']=="progress") echo "On Progress";
else echo "Not Finished Yet";
?>

</div>

</div>

<?php endwhile; ?>

</div>

</form>

</div>

</body>
</html>