<?php  
session_start();
if (!empty($_GET['act']) && !empty($_GET['id'])) {
	$act = $_GET['act'];
	$id = $_GET['id'];

	if ($act == "delete") {
		// Remove data from session
		unset($_SESSION['tasks'][$id - 1]);
		echo "Deleted task.";
	} elseif($act == "done") {
		// First we store the data somewhere temporarily
		// as we need to do an overwrite
		$data = $_SESSION['tasks'] [$id - 1];
		$_SESSION['tasks'] [$id - 1]  = array(
			'task' => $data['task'],
			// Mark task as undone if already  done, or done if otherwise
			'done' => $data['done'] == false ? true: false,
		);
		echo $data['done'] == false ? "Task Done" : "Task to be redone.";
	}
} 

header("location: index.php");
?>

	