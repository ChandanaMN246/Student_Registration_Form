<style>
	body{
		background-image: url('school2.jpeg');
		background-size: cover;
	}
</style>
<body>
<?php
	$username = $_POST['username'];
        $id = $_POST['id'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $course = $_POST['course'];
        $branch = $_POST['branch'];
        //$a=array('school.webp');
        //newt_form_set_background($a, background);
        //background-image:url("school.webp");
        //echo $a[array_rand($a)];
	$conn = new mysqli('localhost','root','','studentdetailes');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into data(username,id,dob,age,gender,email,phone,course,branch) values(?, ?, ?, ?, ?, ?,?,?,?)");
		$stmt->bind_param("sssisssss",$username, $id,$dob,$age, $gender, $email, $phone, $course,$branch);
		$execval = $stmt->execute();
		echo $execval;
		echo "<h1><center>Registration successfully...</center></h1>";
		echo "<h1><center>Thank you for registering.</center></h1>";
		echo "<h1><center>we will contact you as soon as possible</center></h1>";
		$stmt->close();
		$conn->close();
	}
?>
</body>
