<?php
	// Lấy các dữ liệu được chuyển sang
	
	
	// Kết nối đến CSDL
	require('conn.php');
	
	// Kiểm tra xem Username & Password có khớp với thông tin lưu trong CSDL hay không?
	
	// echo $sql; exit();

if (isset($_POST['re_password'])) {
	$old_password=$_POST['old_password'];
	
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];
	$id=$_POST['id'];
	$sql = "
		UPDATE `usr` SET 
			`password`=$password
		WHERE `id` = ".$id
		;

	$sql1="select * from usr";

	$usr=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array($usr);
	if ($id = $row['id']) {
		; ?>
		<script type="text/javascript">
			window.alert("Tên đăng nhập của bạn không đúng, vui lòng thử lại!");
			window.history.go(-1);
		</script>
<?php } else if ($password != $repassword) {
		; ?>
		<script type="text/javascript">
			window.alert("Các mật khẩu bạn đã nhập không khớp, vui lòng thử lại!");
			window.history.go(-1);
		</script>

<?php } else if ($old_password != $row['old_password']) {
		; ?>
		<script type="text/javascript">
			window.alert("Mật khẩu cũ không đúng, vui lòng nhập lại ");
			window.history.go(-1);
		</script>
<?php } else {
		mysqli_query($conn, $sql);
		; ?>
		<script type="text/javascript">
			window.alert("Bạn đã đổi mật khẩu thành công!! ");
			window.location.href="index.php";
		</script>
<?php }
	;
}?>
	