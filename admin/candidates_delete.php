<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM candidates WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Xóa thành công';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Vui lòng chọn ứng cử viên cần xóa';
	}

	header('location: candidates.php');
	
?>