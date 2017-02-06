<?php

class BookingClass{



private $db;

		function __construct($DB_con){

			$this->db = $DB_con;

		}


// add booking

public function addBooking($ref_no,$course_id,$user_id,$customer_name,$email,$address,$phone,$nexttokin_name,$nexttokin_phone,$voucher_code,$quantity,$session,$age,$certificate,$booking_notes,$status){



			$stmt = $this->db->prepare("INSERT INTO bookings(ref_no, course_id, user_id,customer_name,email,address,phone,nexttokin_name,nexttokin_phone,voucher_code,quantity,session,age,certificate,booking_notes,status) VALUES(:ref_no, (select course_id from courses where course_id =:course_id), (select user_id from users where user_id =:user_id), :customer_name, :email, :address, :phone, :nexttokin_name, :nexttokin_phone, :voucher_code, :quantity, :session, :age, certificate, :booking_notes, :status)");
			$stmt->bindparam(":ref_no",$ref_no);
			$stmt->bindparam(":course_id",$course_id);
			$stmt->bindparam(":user_id",$user_id);
			$stmt->bindparam(":customer_name",$customer_name);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":address",$address);
			$stmt->bindparam(":phone",$phone);
			$stmt->bindparam(":nexttokin_name",$nexttokin_name);
			$stmt->bindparam(":nexttokin_phone",$nexttokin_phone);
			$stmt->bindparam(":voucher_code",$voucher_code);
			$stmt->bindparam(":quantity",$quantity);
			$stmt->bindparam(":session",$session);
			$stmt->bindparam(":age",$age);
			$stmt->bindparam(":certificate",$certificate);
			$stmt->bindparam(":booking_notes",$booking_notes);
			$stmt->bindparam(":status",$status);
			
			 $stmt->execute();
			   return true;


				}


	
}


?>