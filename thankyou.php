
<?php
include 'header.php';
session_start();
?>

<div class="container">




<?php 
if(!isset($_SESSION['bookingno']) && empty($_SESSION['bookingno']))

{
		echo "Not found";

	//echo $_SESSION['bookingno'];

}

else {

?>

<div class="row">
<div class="col-md-8 col-md-offset-2 thankyou-message">
<h3>Thankyou your course successfully booked !</h3>
<p>We will get back to you in 48 hours after your voucher code verification.</p>
<label>Booking Reference # :</label> <strong><?php echo $_SESSION['bookingno'];?></strong>

<p class="text-right"><a href="<?php echo BASE_URL; ?>">Book more courses</a></p>
<?php
}
?>


</div>
</div>





<?php
include 'footer.php';
?>