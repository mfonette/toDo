<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['task'])) {
	$_SESSION['tasks'][] =  array(
		'task' => $_POST['task'],
		'done' => false,
	);
}

 ?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>to Do</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>  
<body>
	<main class="container middle">
		<img src="php.jpeg" class="php-img">
		<h2 class="title">PHP toDo List</h2>
		<form action="" method="post" class="form-row align-items-center">
			<input type="tesx" name="task" class="form-control col-sm-10">
			<button type="submit" class="btn btn-primary col-sm-2">Add</button>
		</form>
		<div class="table-responsive">
			<table class="table table-striped">
				<?php if (!empty($_SESSION['tasks'])): ?>
					<?php foreach ($_SESSION['tasks'] as $k => $v): ?>
						<tr>
							<td>
								<input type="checkbox" onchange="checkDone('<?=$k + 1?>')" <?= $v['done'] == true ? "checked" : "" ?>>
							</td>
							<td>
							<?php if ($v['done'] == true): ?>
								<s><?=$v['task']?></s>
							<?php else: ?>
								<?=$v['task'] ?>
							<?php endif; ?>
							</td>
							<!-- <td>
							<?php if ($v['done'] === true): ?>
								<i class="fas fa-check"></i>
							<?php else: ?>
								<a href="action.php?act=done&id=<?=$k + 1?>" class="text-success">
									<i class="fas fa-check"></i>
								</a>
							<?php endif; ?>
							</td> -->
							<td>
								<a href="action.php?act=delete&id=<?=$k + 1?>" class="text-danger">
									<i class="fas fa-times"></i>
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</table>
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script>
		function checkDone (id) {
			window.location.assign('action.php?act=done&id=' + id);
		}
	</script>
</body>
</html>
