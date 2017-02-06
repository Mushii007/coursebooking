<?php
include 'header.php';
session_start();

if (isset($_GET['course-name'])){

$stmt = $DB_con->prepare("SELECT * FROM courses WHERE course_name=:course_name LIMIT 1");
        $stmt->execute(array(":course_name"=>$_GET['course-name']));

/*
while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {

         	echo $row['course_name'];

}*/?>
<?php
//echo '<h3>'.$_SESSION['courseid'].'</h3>';
//echo '<h2>'.$_SESSION['coursename'].'</h2>';

}


if (isset($_POST['course_button'])){

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

	$status  = $_POST['status'];

// sending to data to the class function


if($booking->addBooking($refrence_no,$course_id,$user_id,$customer_name,$email,$address,$phone,$nexttokin_name,$nexttokin_phone,$voucher_code,$quantity,$session,$age,$certificate,$booking_notes,$status))
{

	echo $message= '<div class="alert alert-success">Course Successfully Added</div>';

//	session_unset();
//	session_destroy();
echo	$refrence_no = "";
echo 	$course_id = "";
echo	$user_id = "";
echo 	$status = "";
}

else{

echo 	$message= '<div class="alert alert-danger">Something Went wrong</div>';

}




}






?>
 <div id="page-wrapper">

            <div class="container-fluid">
					<div class="col-md-12 col-lg-12 col-sm-6">

					<h3>Booking Details</h3>

					</div>


						<div class="col-lg-12">

<div class="row">

<!-- <div class="alert alert-success"><?php echo $message;?></div>
<div class="alert alert-danger"><?php echo $message;?></div> -->

                    <div class="col-lg-12">


                        <form role="form" action="" method="post" id="course_form">


		<div class="row">
			<div class="col-md-6">
                            <div class="form-group">
                             	   
				 <input type="hidden" class=""  name="refrence_no" value="<?php echo rand(); ?>">                       
                 <input type="hidden" class="" name="c_name" id="course_name" value="<?php echo $_SESSION['courseid'];?>">
                 <input type="hidden" class=""  name="userid" value="1">
                            </div>
            </div>
			<div class="col-md-6">
                            <div class="form-group">
								
     						</div>
      		</div>
		
		


<div class="row">

				<div class="col-md-6">
			
			             <div class="form-group">	
             				<label>First Name</label>
             			 <input type="text" class="form-control"  name="fname" >                       
             			 </div>

				</div>
				<div class="col-md-6">

						<div class="form-group">	
						<label>Last Name</label>
             			 <input type="text" class="form-control"  name="lname" >                       
             			 </div>


				</div>	

		</div>



<div class="row">

				<div class="col-md-6">
			
			             <div class="form-group">
			             <label>Email Address</label>	
             			 <input type="text" class="form-control"  name="emailadd" >                       
             			 </div>

				</div>
				<div class="col-md-6">

						<div class="form-group">
						<label>Residentials Address</label>	
             			 <input type="text" class="form-control"  name="res_add" >                       
             			 </div>


				</div>	

		</div>



<div class="row">

				<div class="col-md-6">
			
			             <div class="form-group">	
			             <label>Mobile #</label>
             			 <input type="text" class="form-control"  name="mobile" >                       
             			 </div>

				</div>
				<div class="col-md-6">

						<div class="form-group">
						<label>Next to Kin Name</label>	
             			 <input type="text" class="form-control"  name="nexttokin_name" >                       
             			 </div>


				</div>	

		</div>



<div class="row">

				<div class="col-md-6">
			
			             <div class="form-group">
			             <label>Nexto kin Number</label>	
             			 <input type="text" class="form-control"  name="nextokin_number" >                       
             			 </div>

				</div>
				<div class="col-md-6">

						<div class="form-group">
						<label>Voucher Code</label>	
             			 <input type="text" class="form-control"  name="voucher_code">                       
             			 </div>


				</div>	

		</div>



<div class="row">

				<div class="col-md-6">
			
			             <div class="form-group">
			             <label>Quantity</label>	
			             <input type="number" class="form-control"  name="quantity" ">
             			 </div>

				</div>
				<div class="col-md-6">

						<div class="form-group">
						<label>Course Session</label>	
             			 <select class="form-control" name="class_session">
             			 <option value="">Select Session</option>
             			 <option value="Morning(9AM - 12PM)">Morning</option>
             			 <option value="Afternoon(12:30PM - 3:30PM)">Afternoon</option>
             			 <option value="Evening(4:00PM - 7:00PM)">Evening</option>
             			 
             			 </select>                       
             			                        
             			 </div>


				</div>	

		</div>



<div class="row">

				<div class="col-md-6">
			
			             <div class="form-group">	
			             <label>Age</label>
             			 <select class="form-control" name="age">
             			 <option value="">Select Age</option>
             			 <option value="14">14</option>
             			 <option value="15">16</option>
             			 <option value="17">17</option>
             			 <option value="18">18</option>
             			 <option value="19">19</option>
             			 <option value="20">20</option>
             			 <option value="21">21</option>
             			 <option value="22">22</option>
             			 <option value="23">23</option>
             			 <option value="24">24</option>
             			 <option value="25">25</option>
             			 <option value="26">26</option>
             			 
             			 </select>                       
             			 </div>

				</div>
				<div class="col-md-6">

						<div class="form-group">
						<p>You want Certificate? </p>	
                     <!-- <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="Yes" name="certificate">
                        <label for="inlineCheckbox1"> Yes </label>
                    </div> -->
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="option1" checked="checked" name="certificate">
                        <label for="inlineCheckbox2"> No </label>
                    </div>

                       
             			 </div>


				</div>	

		</div>



<div class="row">

				<div class="col-md-6">
			
			             <div class="form-group">
			             <label>Booking Note</label>	
             			 <textarea class="form-control" name="booking_note"></textarea>                       
             			 </div>

				</div>
				<div class="col-md-6">

						<div class="form-group">	
                       
             			 </div>


				</div>	

		</div>






			 	 <input type="hidden" class="" name="status" value="pending">

		           <input type="submit" class="btn btn-primary" name="course_button" value="Submit Button">
                            <button type="reset" class="btn btn-primary">Reset Button</button>


						</form>
		
		</div>

</div>



						</div>


			</div>


</div>