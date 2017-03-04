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

	$course_location= $_POST['course_location'];

	$price= $_POST['price'];

	$status  = $_POST['status'];

// sending to data to the class function

try{
if($booking->addBooking($refrence_no,$course_id,$user_id,$customer_name,$email,$address,$phone,$nexttokin_name,$nexttokin_phone,$voucher_code,$quantity,$session,$age,$certificate,$booking_notes,$course_location,$price,$status))
{




//	echo $message= '<div class="alert alert-success">Course Successfully Added</div>';
		echo  $_SESSION['bookingno'] = $refrence_no;

		echo	$refrence_no = "";
echo 	$course_id = "";
echo	$user_id = "";
echo 	$status = "";
echo $customer_name = "";




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
<script type="text/javascript">
	$( document ).ready(function(){
	$('#quantity1').bind('keyup keypress blur', function() 
	{  
    	$('#quantity2').val($(this).val()); 
	});


	$('input[name=payment_method]').click(function () {
    if (this.id == "pay_arrival_btn") {
        $(".pay_submit").show('slow');
        $(".paypal_submit").hide('slow');
    } else {
        $(".pay_submit").hide('slow');
        $(".paypal_submit").show('slow');

    }
	});

	

		$(window).load(function() {
		      submitForm();
		});


	});


function submitForm() {
   // Get the first form with the name
   // Hopefully there is only one, but there are more, select the correct index
   var frm = document.getElementsByName('bookingform')[0];
  // frm.submit(); // Submit
   frm.reset();  // Reset
 //  return false; // Prevent page refresh
}


</script>



            <div class="container">
					

					<h3>Booking Details</h3>

					



<!-- <div class="row">
 -->
<!-- <div class="alert alert-success"><?php echo $message;?></div>
<div class="alert alert-danger"><?php echo $message;?></div> -->
<div class="row">
                    <div class="col-md-6">


                        <form role="form" action="" method="post" id="course_form" name="bookingform">


		<div class="row">
			<div class="col-md-6">
                            <div class="form-group">
                             	   
				 <input type="hidden" class=""  name="refrence_no" value="<?php echo "LMS-BNO-".rand(); ?>">                       
                 <input type="hidden" class="" name="c_name" id="course_name" value="<?php echo $_SESSION['courseid'];?>">
                 <input type="hidden" class=""  name="userid" value="1">
                            </div>
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
			             <input type="number" class="form-control"  name="quantity" id="quantity1">
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
                     <div class="radio radio-inline">
                        <input type="radio" id="inlineCheckbox1" value="Yes" name="certificate">
                        <label for="inlineCheckbox1"> Yes </label>
                    </div> 
                    <div class="radio radio-inline">
                        <input type="radio" id="inlineCheckbox2" value="no" checked="checked" name="certificate">
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

							
                
						<label>Select payment method? </label>	
                     <label class="radio-inline">
                        <input type="radio" id="pay_arrival_btn" value="Yes" checked="checked" name="payment_method">Pay on arrival?
                       <!--  <label for="inlineCheckbox1"> Pay on Arrival </label> -->
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" id="pay_paypal_btn" value="no"  name="payment_method">Pay with PayPal?
                        <!-- <label for="inlineCheckbox2">  </label> -->
                    </label>

                       
    			


				</div>	

		</div>

				


				 <input type="hidden" class="" name="price" value="<?php echo $_SESSION['price']; ?>">
				 <input type="hidden" class="" name="course_location" value="<?php echo $_SESSION['location']; ?>">
			 	 <input type="hidden" class="" name="status" value="pending">
			 	 <div class="pay_submit">
		           <input type="submit" class="btn btn-primary " name="course_button" value="Place booking" >
                            <button type="reset" class="btn btn-primary">Reset Button</button>
                 </div>          

						</form>
		
		</div>




						</div>

<?php

$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'new_chemist-bussiness@hotmail.com'; //Business Email

?>
<form action="<?php echo $paypalURL; ?>" method="post">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
         <input type="hidden" name="item_name" value="<?php echo $_SESSION['coursename']; ?>">
             <input type="hidden" name="item_number" value="<?php echo $_SESSION['courseid'];?>">
        <input type="hidden" name="quantity" id="quantity2" value="">
        <input type="hidden" name="amount" value="<?php echo $_SESSION['price']; ?>">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/coursebooking/cancel.php'>
<input type='hidden' name='return' value='http://localhost/coursebooking/succes.php'>
       
          <input type='hidden' name='notify_url' value='http://localhost/coursebooking/ipn.php'>
 

   <div class="paypal_submit" style="display:none;">

        <!-- Display the payment button. -->
        <!-- <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online"> -->
        <input type="submit" name="paypalsubmit" value="Paypal" class="btn btn-primary">
        </div>
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    </form>			




<?php

include 'footer.php';

?>