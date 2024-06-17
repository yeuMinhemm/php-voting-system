<?php
	include 'includes/session.php';

	$sql = "DELETE FROM votes";
	if($conn->query($sql)){
		$_SESSION['success'] = "Đặt lại thành công";
	}
	else{
		$_SESSION['error'] = "Có lỗi xảy ra";
	}

	header('location: votes.php');

?>