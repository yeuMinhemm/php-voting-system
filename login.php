<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Không thể tìm thấy cử tri với ID';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['voter'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Mật khẩu không đúng';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Yêu cầu xác thực cử tri trước';
	}

	header('location: index.php');

?>