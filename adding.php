<?php

include "header.php";
//echo '<h3>'.$_SESSION['courseid'].'</h3>';
//echo '<h2>'.$_SESSION['coursename'].'</h2>';
if($_POST['course_button']){
	$refrence_no = $_POST['refrence_no'];
	$course_id = $_POST['c_name'];
	
	$user_id = $_POST['userid'];
	$customer_name = $_POST['fname'].$_POST['lname'];
    $email = $_POST['emailadd'];
    $address = $_POST['res_add'];
	$phone = $_POST['mobile'];
	$nexttokin_name = $_POST['nexttokin_name'];
	$nexttokin_phone = $_POST['nextokin_number'];
	$voucher_code = $_POST['voucher_code'];
	$quantity= $_POST['quantity'];
	
	$session= $_POST['class_session'];
	
	$age= $_POST['age'];
	
	$certificate= $_POST['certificate'];
	
	$booking_notes= $_POST['booking_note'];
	$course_location= $_POST['course_location'];
	$price= $_POST['price'];
	$status  = $_POST['status'];
// sending to data to the class function
try{
if($booking->addBooking($refrence_no,$course_id,$user_id,$customer_name,$email,$address,$phone,$nexttokin_name,$nexttokin_phone,$voucher_code,$quantity,$session,$age,$certificate,$booking_notes,$course_location,$price,$status))
{
//	echo $message= '<div class="alert alert-success">Course Successfully Added</div>';
		echo  $_SESSION['bookingno'] = $refrence_no;
	
		header("Location: thankyou.php");
/*	session_unset();
	session_destroy();*/
}
else{
echo 	$message= '<div class="alert alert-danger">Something Went wrong</div>';
}
}
catch (PDOException $e){
echo $e->getMessage("Something went wrong");
return false;
}
}

?>
<script>
$(document).on('click','#bookingplace',function(){

			var url = "adding.php";
			$.ajax({
           type: "POST",
           url: url,
           data: $("#course_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
               
			 alert('Yes!');
			 $('.form-control').val('');
           },
		   error: function(){
			   alert('Error');
		   }
		  
         });



		});
</script>