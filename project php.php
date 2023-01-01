<?php
   $name = $_POST['name'];
   $rollno = $_POST['rollno'];
   $semester = $_POST['semester'];
   $branch = $_POST['branch'];
   $dob =$_POST['dob'];
   $phoneno = $_POST['phoneno'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   
   //DATABASE

   $conn = new mysqli('localhost','root','','yash');
	if($conn->connect_error) {
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);


	}  else  {
		 $stmt = $conn->prepare("insert into register(name, rollno, semester, branch, dob, phoneno, email, address) values(?, ?, ?, ?, ?, ?, ?, ?)");
		 $stmt->bind_param("siisiiss", $name, $rollno,$semester,$branch,$dob,$phoneno, $email,$address);
		 $execval = $stmt->execute();

		echo $execval;

		echo "Registration successfully...";

		$stmt->close();

		$conn->close();
	}
?>