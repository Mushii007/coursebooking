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
	$customer_name = $_POST['fname'];
    $email = $_POST['emailadd'];
	$postcode = $_POST['postcode'];
    $address = $_POST['res_add'];
	$phone = $_POST['mobile'];
	$quantity= $_POST['quantity'];
	$session= $_POST['class_session'];
	$dob= $_POST['dob'];
/*	$certificate= $_POST['certificate'];
*/	$health_issue= $_POST['health_issue'];
	$special_requirement= $_POST['special_requirement'];
	$previous_learning= $_POST['previous_learning'];
	$hear_about_us= $_POST['hear_about_us'];
	//$voucher_provider= $_POST['voucher_provider'];
	$course_location= $_POST['course_location'];
	$voucher_code = $_POST['voucher_code'];
	$price= $_POST['price'];
	$status  = $_POST['status'];
	/*Price with quantity*/   
	$finalprice =  $price * $quantity;

// sending to data to the class function

try{
if($booking->addBooking($refrence_no,$course_id,$user_id,$customer_name,$email,$postcode,$address,$phone,$voucher_code,$quantity,$session,$dob,$health_issue,$special_requirement,$previous_learning,$hear_about_us,$course_location,$finalprice,$status))
{


print_r($booking);

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

echo $e->getMessage();
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
	$('#fname1').bind('keyup keypress blur', function() 
	{  
    	$('#fname2').val($(this).val()); 
	});

	$('#lname1').bind('keyup keypress blur', function() 
	{  
    	$('#lname2').val($(this).val()); 
	});

	$('#emailadd1').bind('keyup keypress blur', function() 
	{  
    	$('#emailadd2').val($(this).val()); 
	});

	$('#res_add1').bind('keyup keypress blur', function() 
	{  
    	$('#res_add2').val($(this).val()); 
	});

	$('#mobile1').bind('keyup keypress blur', function() 
		{  
	    	$('#mobile2').val($(this).val()); 
		});

	$('#nexttokin_name1').bind('keyup keypress blur', function() 
		{  
	    	$('#nexttokin_name2').val($(this).val()); 
		});

	$('#nexttokin_number1').bind('keyup keypress blur', function() 
		{  
	    	$('#nexttokin_number2').val($(this).val()); 
		});

	$('#voucher_code1').bind('keyup keypress blur', function() 
		{  
	    	$('#voucher_code2').val($(this).val()); 
		});

	$('#session1').bind('keyup keypress blur', function() 
		{  
	    	$('#class_session2').val($(this).val()); 
		});

	$('#dob1').bind('keyup keypress blur', function() 
		{  
	    	$('#dob2').val($(this).val()); 
		});
	$('#voucher_provider1').bind('change', function() 
		{  
	    	$(".voucher-code-value").show('slow');
		});

	$('#certificate1').bind('keyup keypress blur', function() 
			{  
		    	$('#certificate2').val($(this).val()); 
			});

$('#booking_note1').bind('keyup keypress blur', function() 
			{  
		    	$('#booking_note2').val($(this).val()); 
			});


	  /*  $('#booking_note1').on('keydown', function(event){
        var key = String.fromCharCode(event.which);
        if (!event.shiftKey) {
            key = key.toLowerCase();
        }
        $('#booking_note2').val( $(this).val() + key );
    	});*/

	$('input[name=payment_method]').click(function () {
    if (this.id == "pay_arrival_btn") {
        $(".pay_submit").show('slow');
        $(".voucher-provider").hide('slow');
        $(".paypal_submit").hide('slow');
    }
    if (this.id == "pay_paypal_btn") {
    	$(".pay_submit").hide('slow');
    	$(".voucher-provider").hide('slow');
        $(".paypal_submit").show('slow');
    }

    if (this.id == "pay_voucher_btn") {
    	
        $(".paypal_submit").hide('slow');
        $(".voucher-provider").show('slow');
        $(".pay_submit").show('slow');
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
                    <div class="col-md-12 ">


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

				<div class="col-md-4">
			
			             <div class="form-group">	
             				<label>First Name</label>
             			 <input type="text" class="form-control"  name="fname" id="fname1">                       
             			 </div>

				</div>
				<div class="col-md-4">

						<div class="form-group">	
						<label>Last Name</label>
             			 <input type="text" class="form-control"  name="lname" id="lname1" >                       
             			 </div>


				</div>

				<div class="col-md-4">
			
			             <div class="form-group">
			             <label>Email Address</label>	
             			 <input type="text" class="form-control"  name="emailadd" id="emailadd1">                       
             			 </div>

				</div>
					
				

		</div>

<div class="row">


				<div class="col-md-4">

						<div class="form-group">	
						<label>Post Code</label>
             			 <input type="text" class="form-control"  name="postcode" id="postcode1" >                       
             			 </div>


				</div>
				<div class="col-md-4">

						<div class="form-group">
						<label>Residentials Address</label>	
             			 <input type="text" class="form-control"  name="res_add" id="res_add1" >                       
             			 </div>


				</div>	
				<div class="col-md-4">
			
			             <div class="form-group">	
			             <label>Mobile #</label>
             			 <input type="text" class="form-control"  name="mobile" id= "mobile1">                       
             			 </div>

				</div>
		</div>
<!-- <div class="row">

				
				<div class="col-md-6">

						<div class="form-group">
						<label>Next to Kin Name</label>	
             			 <input type="text" class="form-control"  name="nexttokin_name" id="nexttokin_name1">                       
             			 </div>


				</div>	
		</div>
<div class="row">

				<div class="col-md-6">
			
			             <div class="form-group">
			             <label>Nexto kin Number</label>	
             			 <input type="text" class="form-control"  name="nextokin_number" id="nexttokin_number1" >                       
             			 </div>

				</div>
				<div class="col-md-6">

						<div class="form-group">
						<label>Voucher Code</label>	
             			 <input type="text" class="form-control"  name="voucher_code" id="voucher_code1">                       
             			 </div>


				</div>	
		</div>
 --><div class="row">

				<div class="col-md-4">
			
			             <div class="form-group">
			             <label>Quantity</label>	
			             <input type="number" class="form-control"  name="quantity" id="quantity1">
             			 </div>

				</div>
				<div class="col-md-4">

						<div class="form-group">
						<label>Course Session</label>	
             			 <select class="form-control" name="class_session" id="session1">
             			 <option value="">Select Session</option>
             			 <option value="Morning(9AM - 12PM)">Morning</option>
             			 <option value="Afternoon(12:30PM - 3:30PM)">Afternoon</option>
             			 <option value="Evening(4:00PM - 7:00PM)">Evening</option>
             			 
             			 </select>                       
             			                        
             			 </div>


				</div>	
				<div class="col-md-4">
			
			             <div class="form-group">	
			             <label>Date of Birth</label>
             			 <input type="date" class="form-control"  name="dob" id= "dob">                       
             			 </div>

				</div>
		</div>
<!-- <div class="row">

				<div class="col-md-6">
			
			             <div class="form-group">	
			             <label>Age</label>
             			 <select class="form-control" name="age" id="age1">
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
                        <input type="radio" id="inlineCheckbox1" value="Yes" name="certificate" id="cert_yes1">
                        <label for="inlineCheckbox1"> Yes </label>
                    </div> 
                    <div class="radio radio-inline">
                        <input type="radio" id="inlineCheckbox2" value="no" checked="checked" name="certificate"  id="cert_no1">
                        <label for="inlineCheckbox2"> No </label>
                    </div>

                       
             			 </div>


				</div>	

		</div>
 -->


<div class="row">

				<div class="col-md-4">
			
			             <div class="form-group">
			             <label>Any Health Issues?</label>&nbsp;<sm>(Please state)</sm>	
             			 <textarea class="form-control" name="health_issue" id="health_issue1"></textarea>                       
             			 </div>

				</div>
				<div class="col-md-4">
			
			             <div class="form-group">
			             <label>Special Requirements?</label>&nbsp;<sm>(Please state)</sm>	
             			 <textarea class="form-control" name="special_requirement" id="special_requirement1"></textarea>                       
             			 </div>

				</div>
				<div class="col-md-4">
			
			             <div class="form-group">
			             <label>Previous Learning</label>&nbsp;<sm>(Please state)</sm>	
             			 <textarea class="form-control" name="previous_learning" id="previous_learning1"></textarea>                       
             			 </div>

				</div>
				
		</div>
		<div class="row">

				<div class="col-md-4">			
			             <div class="form-group">
   			             <label>How did you Hear about us?</label>	

			             <select class="form-control" name="hear_about_us" id="hear_about_us1">
			             	<option value="">--Select--</option>
			             	<option value="Google">Google</option>
							<option value="Social Media">Social Media</option>
							<option value="Friend">Friend</option>
							<option value="other">Other</option>
							
			             </select>                       
             			 </div>
				</div>
				<div class="col-md-6">			
				<label>Select payment method?</label><br/>
                     <label class="radio-inline">
                        <input type="radio" id="pay_arrival_btn" value="Yes" checked="checked" name="payment_method" id="pay1">Direct Pay
                       <!--  <label for="inlineCheckbox1"> Pay on Arrival </label> -->
                    </label> 
                    <label class="radio-inline">
                        <input type="radio" id="pay_paypal_btn" value="no"  name="payment_method" id="paypal_yes1">Pay with PayPal?
                        <!-- <label for="inlineCheckbox2">  </label> -->
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="pay_voucher_btn" value="no"  name="payment_method" id="voucher_pay1">Pay with Voucher?
                        <!-- <label for="inlineCheckbox2">  </label> -->
                    </label>
				</div>	

		</div>


		<div class="row voucher-provider" style="display:none;">

			<div class="col-md-4">			
			             <div class="form-group">
   			             <label>Select Vocuher Provider</label>	

			             <select class="form-control" name="voucher_provider" id="voucher_provider1">
			             	<option value="NULL">--Select--</option>
			             	<option value="Wowcher">Wowcher</option>
							<option value="Groupon">Groupon</option>
							<option value="London Makeup Studio">London Makeup Studio</option>
							<option value="Social Media Promocode">Social Media Promocode</option>
							<option value="Google Promocode">Google Media Promocode</option>
							
			             </select>                       
             			 </div>
				</div>
			<div class="col-md-4 voucher-code-value" style="display:none;">

					<div class="form-group">
						<label>Voucher Code</label>	
             			 <input type="text" class="form-control"  name="voucher_code" id="voucher_code1">               
           			 </div>

			</div>	
			
		</div>
		<br/>
				


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
<form action="payments.php" method="post">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" class=""  name="refrence_no" value="<?php echo "LMS-BNO-".rand(); ?>">
      <input type="hidden" class=""  name="userid" value="1">
	
	<!--Binding Above form entries -->


		 <input type="hidden" class="form-control"  name="fname" id="fname2">              
		 <input type="hidden" class="form-control"  name="lname" id="lname2">                       
         <input type="hidden" class="form-control"  name="emailadd" id="emailadd2">                       
         <input type="hidden" class="form-control"  name="res_add" id="res_add2">                       
         <input type="hidden" class="form-control"  name="mobile" id="mobile2">                       
         <input type="hidden" class="form-control"  name="nexttokin_name" id="nexttokin_name2">                       
         <input type="hidden" class="form-control"  name="nextokin_number" id="nexttokin_number2">                       
         <input type="hidden" class="form-control"  name="voucher_code" id="voucher_code2">                       
         <input type="hidden" class="form-control"  name="class_session" id="class_session2">                       
         <input type="hidden" class="form-control"  name="dob" id="dob2">                       
         <input type="hidden" class="form-control"  name="certificate" id="certificate2">                       
         <textarea class="form-control" name="booking_note" id="booking_note2" style="display:none;"></textarea> 

         <input type="hidden" class="" name="course_location" value="<?php echo $_SESSION['location']; ?>">
		 <input type="hidden" class="" name="status" value="pending">                       
                      


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