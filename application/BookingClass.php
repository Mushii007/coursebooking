<?php

class BookingClass{



private $db;

		function __construct($DB_con){

			$this->db = $DB_con;

		}


// add booking

public function addBooking($ref_no,$course_id,$user_id,$customer_name,$email,$postcode,$address,$phone,$voucher_code,$quantity,$session,$age,$health_issue,$special_requirement,$previous_learning,$hear_about_us,$course_location,$price,$status){



			$stmt = $this->db->prepare("INSERT INTO bookings(ref_no, course_id, user_id,customer_name,email,postcode,address,phone,voucher_code,quantity,session,age,health_issue,special_requirement,previous_learning,hear_about_us,course_location,price,status) VALUES(:ref_no, (select course_id from courses where course_id =:course_id), (select user_id from users where user_id =:user_id), :customer_name, :email,:postcode, :address,:phone,:voucher_code,:quantity,:session,:age,:health_issue, :special_requirement,:previous_learning,:hear_about_us,:course_location,:price,:status)");
			$stmt->bindparam(":ref_no",$ref_no);
			$stmt->bindparam(":course_id",$course_id);
			$stmt->bindparam(":user_id",$user_id);
			$stmt->bindparam(":customer_name",$customer_name);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":postcode",$postcode);
			$stmt->bindparam(":address",$address);
			$stmt->bindparam(":phone",$phone);
			$stmt->bindparam(":voucher_code",$voucher_code);
			$stmt->bindparam(":session",$session);
			$stmt->bindparam(":age",$age);
			$stmt->bindparam(":health_issue",$health_issue);
			$stmt->bindparam(":special_requirement",$special_requirement);
			$stmt->bindparam(":previous_learning",$previous_learning);
			$stmt->bindparam(":hear_about_us",$hear_about_us);
			$stmt->bindparam(":course_location",$course_location);
			$stmt->bindparam(":quantity",$quantity);
			$stmt->bindparam(":price",$price);
			$stmt->bindparam(":status",$status);
			
			 $stmt->execute();
			   return true;


				}


	// Admin booking list

				public function AdminBookingList($query){

				$stmt = $this->db->prepare($query);
					  $stmt->execute();

					  if($stmt->rowCount()>0)
					  {
					     $serialno=1;
					    

					   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					   {
?>
					   		<tr>
                
                <td><?php echo $serialno++; ?></td>
                
                <td><?php print($row['ref_no']); ?></td>
                <td><?php print($row['course_name']); ?></td>
                <td><?php print($row['username']); ?></td>
             
                <td><?php print($row['customer_name']); ?></td>
             
                <td><?php print($row['email']); ?></td>
                <td><?php print($row['address']); ?></td>
                <td><?php print($row['phone']); ?></td>
                <td><?php print($row['voucher_code']); ?></td>
                <td><?php print($row['quantity']); ?></td>
                <td><?php print($row['session']); ?></td>
                <td><?php print($row['price']); ?></td>
                <td><?php print($row['booking_date']); ?></td>
                <td style="color:yellow;"><?php print($row['status']); ?></td>
<!--                <td><?php print($row['post_time']); ?></td>-->

                <td align="center">
                <a href="#"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="#"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>

<?php

					   }


		}




}

// Total number of bookings

		public function totalBookings(){

			                $stmt=$this->db->prepare("Select COUNT(booking_id) as TotalBooking FROM bookings");
                $stmt->execute();
				if($stmt->rowCount()>0)
					  {
                         while ($row=$stmt->fetch(PDO::FETCH_BOTH)){

                                echo $row['TotalBooking'];
                }
                return true;
				}
		}



//SELECT COUNT(booking_id) FROM bookings WHERE `status` = 'pending' AND date(booking_date) = date(NOW())
// New bookings

		public function NewBookings(){

			                $stmt=$this->db->prepare("SELECT COUNT(booking_id) AS Newbooking FROM bookings WHERE `status` = 'pending' AND date(booking_date) = date(NOW())
");
                $stmt->execute();
				if($stmt->rowCount()>0)
					  {
                         while ($row=$stmt->fetch(PDO::FETCH_BOTH)){
								echo $row['Newbooking'];
                               // echo '<script type="text/javascript">alert("'.$row['Newbooking'].'");</script>';
                }
                return true;
				}
		}

}
?>