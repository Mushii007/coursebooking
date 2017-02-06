<?php

class CourseClass{

	private $db;

		function __construct($DB_con){

			$this->db = $DB_con;

		}


// Course list method

		 function courseList($query){

				$stmt=$this->db->prepare($query);
				$stmt->execute();
				if ($stmt->rowCount()>0){

					while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
						
						$tutorial_id = $row['course_id'];
?>

<div class="row">
            <!-- <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div> -->
            <div class="col-md-10 ">
                <a class="course-title-link" href="./course.php?cname=<?php echo $row['course_name'];?>"><h3 class="course-title"><?php echo $row['city']."-".$row['course_name']?></h3></a>
                <div class="row">
               
                <div class="col-md-4">
                <span class="glyphicon glyphicon-calendar"></span>&nbsp;  <?php echo date('l', strtotime($row['course_date'])).",&nbsp;".date("j F, Y",strtotime($row['course_date']));?>&nbsp;&nbsp;<?php //echo $row['start_time'];?> <?php ///echo $row['end_time'];?>
                </div>
                <!--<div class="col-md-3">
                <span class="glyphicon glyphicon-time"></span>&nbsp;  
                </div>-->
                <div class="col-md-3">
               <span class="glyphicon glyphicon-user"></span>&nbsp;  <?php echo $row['seats'].'  seats available';?>
                </div>
                <div class="col-md-2">
               <span class="fa fa-money"></span>&nbsp;  <strong><?php echo '$'.$row['price'];?></strong>
                </div>
                <div class="col-md-3">
                <span class="glyphicon glyphicon-time"></span><ul style="list-style-type:none; margin:-20px 0 0 -18px;"><li> <?php echo $row['course_session'];?></li></ul>
                </div>
               <div class="clearfix"></div>
                 <div class="col-md-6" style="margin:12px 0 0 0; ">
                <span class="glyphicon glyphicon-map-marker"></span>&nbsp; <?php echo $row['location'];?>
                </div>
				<div class="col-md-6" style="margin:12px 0 0 0; ">
                <span class="glyphicon glyphicon-map-marker"></span>&nbsp; <?php echo $row['city'];?>
                </div>
                </div>
                <br/>
                <h4>Details</h4>
                <p><?php echo $row['course_description'];?>

                </p>
              
            </div>
            <div class="col-md-offset-10 col-sm-2">
             <a class="btn btn-primary" href="./course.php?cname=<?php echo $row['course_name'];?>">View details <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>




<?php
						/*$row['course_name'];
						$row['course_description'];
						$row['location'];
						$row['course_date'];
						$row['start_time'];
						$row['end_time'];
						$row['price'];
						$row['loc_lat'];
						$row['loc_lang'];
						$row['seats'];*/

					}
?>

<?php

				}
?>
<div class="show_more_main" id="show_more_main<?php echo $tutorial_id; ?>">
        <span id="<?php echo $tutorial_id; ?>" class="btn btn-primary show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading....</span></span>
    </div>
<?php
		}

// ajax list

		public function ajaxcourseList($query){

				$stmt=$this->db->prepare($query);
				$stmt->execute();
				if ($stmt->rowCount()>0){

					while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>
<div class="row">
            <!-- <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div> -->
            <div class="col-md-10 ">
                <a href=""><h3 class="course-title"><?php echo $row['city']."-".$row['course_name']?></h3></a>
                <div class="row">
               
                <div class="col-md-3">
                <span class="glyphicon glyphicon-calendar"></span>&nbsp;  <?php echo $row['course_date'];?>&nbsp;&nbsp;<?php echo $row['start_time'];?> - <?php echo $row['end_time'];?>
                </div>
                <!--<div class="col-md-3">
                <span class="glyphicon glyphicon-time"></span>&nbsp;  
                </div>-->
                <div class="col-md-3">
               <span class="glyphicon glyphicon-user"></span>&nbsp;  <?php echo $row['seats'].'  seats available';?>
                </div>
                <div class="col-md-3">
               <span class="glyphicon glyphicon-usd"></span>&nbsp;  <strong><?php echo '$'.$row['price'];?></strong>
                </div>
                <div class="col-md-3">
                <span class="glyphicon glyphicon-random"></span>&nbsp;  <?php echo $row['course_type'];?>
                </div>
				</div>
				<div class="row">
               <div class="clearfix"></div>
                 <div class="col-md-6" style="margin:12px 0 0 0; ">
                <span class="glyphicon glyphicon-map-marker"></span>&nbsp; <?php echo $row['location'];?>
                </div>
				<div class="col-md-6" style="margin:12px 0 0 0; ">
                <span class="glyphicon glyphicon-map-marker"></span>&nbsp; <?php echo $row['city'];?>
                </div>
                </div>
                <br/>
                <h4>Details</h4>
                <p><?php echo $row['course_description'];?>

                </p>
              
            </div>
            <div class="col-md-offset-10 col-sm-2">
             <a class="btn btn-primary" href="#">View details <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>




<?php
						/*$row['course_name'];
						$row['course_description'];
						$row['location'];
						$row['course_date'];
						$row['start_time'];
						$row['end_time'];
						$row['price'];
						$row['loc_lat'];
						$row['loc_lang'];
						$row['seats'];*/

					}


				}



		}



// Total number of Courses

		public function totalCourse(){

			                $stmt=$this->db->prepare("Select COUNT(course_id) as TotalCourse FROM courses");
                $stmt->execute();
                         while ($row=$stmt->fetch(PDO::FETCH_BOTH)){

                                echo $row['TotalCourse'];
                }
                return true;

		}

// Admin Course list

		public function AdminCourseList($query){

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
                
                <td><?php print($row['course_name']); ?></td>
                <td><?php print($row['course_description']); ?></td>
                <td><?php print($row['location']); ?></td>
                <td><?php print($row['city']); ?></td>
             
                <td><?php print($row['course_date']); ?></td>
             
                <td><?php print($row['start_time']); ?></td>
                <td><?php print($row['end_time']); ?></td>
                <td><?php print($row['price']); ?></td>
                <td><?php print($row['course_type']); ?></td>
                <td><?php print($row['loc_lat']); ?></td>
                <td><?php print($row['loc_lang']); ?></td>
                <td><?php print($row['seats']); ?></td>
<!--                <td><?php print($row['post_time']); ?></td>-->

                <td align="center">
                <a href="<?php echo BASE_URL;?>admin/courses/editCourse.php?edit_id=<?php print($row['course_id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="<?php echo BASE_URL;?>admin/courses/delCourse.php?del_id=<?php print($row['course_id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>

<?php

					   }


		}




}

// Add course function

	public function addCourse($course_name,$course_desc,$location,$city,$course_date,$session,$price,$course_type,$seats){



			$stmt = $this->db->prepare("INSERT INTO courses(course_name,course_description,location,city,course_date,course_session,price,course_type,seats) VALUES(:course_name, :course_desc, :location, :city, :course_date, :session, :price, :course_type, :seats)");
			$stmt->bindparam(":course_name",$course_name);
			$stmt->bindparam(":course_desc",$course_desc);
			$stmt->bindparam(":location",$location);
 			$stmt->bindparam(":city",$city);
			$stmt->bindparam(":course_date",$course_date);
			$stmt->bindparam(":session",$session);
	        //$stmt->bindparam(":end_time",$end_time);
			$stmt->bindparam(":price",$price);
			$stmt->bindparam(":course_type",$course_type);
		/*	$stmt->bindparam(":loc_lat",$loc_lat);
			$stmt->bindparam(":loc_long",$loc_long);
*/			$stmt->bindparam(":seats",$seats);
 	
			 $stmt->execute();
			   return true;


				}

		public function get_courses_ids($id){

		$stmt= $this->db->prepare("Select * from courses WHERE course_id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		  return $editRow;

		}		


		public function get_courses_names($cname){

		$stmt= $this->db->prepare("Select * from courses WHERE course_name=:$cname");
		$stmt->execute(array(":cname"=>$cname));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		  return $editRow;

		}	


// edit course

		public function editCourse($cid,$course_name,$course_desc,$location,$city,$course_date, $start_time,$end_time, $price, $course_type, $loc_lat, $loc_long, $seats){

			try{
			$stmt= $this->db->prepare("UPDATE courses SET course_name=:course_name, course_description=:course_desc, location=:location,city=:city ,course_date=:course_date, start_time= :start_time, end_time=:end_time, price=:price, course_type=:course_type, loc_lat=:loc_lat, loc_lang=:loc_long, seats=:seats WHERE course_id=:cid");

			 $stmt->bindparam(":cid",$cid); 
			 $stmt->bindparam(":course_name",$course_name);
			 $stmt->bindparam(":course_desc",$course_desc);
			 $stmt->bindparam(":location",$location);
			 $stmt->bindparam(":city",$city);
			$stmt->bindparam(":course_date",$course_date);
			$stmt->bindparam(":start_time",$start_time);
			$stmt->bindparam(":end_time",$end_time);
			$stmt->bindparam(":price",$price);
			$stmt->bindparam(":course_type",$course_type);
			$stmt->bindparam(":loc_lat",$loc_lat);
			$stmt->bindparam(":loc_long",$loc_long);
			$stmt->bindparam(":seats",$seats);

			$stmt->execute();
			   return true;

				}

			catch (PDOException $e){

			echo $e->getMessage();
			return false;

}
}



//delete course

			public function delCourse($cid){

			$stmt=$this->db->prepare('DELETE FROM courses WHERE course_id=:id ');
			$stmt->bindparam(":id",$cid);
			$stmt->execute();

			return true;

				
			}

			public function SeachCourses($query){

					$stmt=$this->db->prepare($query);
				//	$stmt->bindparam(":date",$date);
					$stmt->execute();
					if ($stmt->rowCount()>0){

					while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					    
						?>
						<div class="row">
            <!-- <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div> -->
            <div class="col-md-10 ">
                <a class="course-title-link" href="./course.php?cname=<?php echo $row['course_name'];?>"><h3 class="course-title"><?php echo $row['course_name']?></h3></a>
                <div class="row">
               
                <div class="col-md-3">
                <span class="glyphicon glyphicon-calendar"></span>&nbsp;  <?php echo date('l', strtotime($row['course_date'])).",&nbsp;".date("j F, Y",strtotime($row['course_date']));?>&nbsp;&nbsp;<?php //echo $row['start_time'];?> <?php ///echo $row['end_time'];?>
                </div>
                <!--<div class="col-md-3">
                <span class="glyphicon glyphicon-time"></span>&nbsp;  
                </div>-->
                <div class="col-md-3">
               <span class="glyphicon glyphicon-user"></span>&nbsp;  <?php echo $row['seats'].'  seats available';?>
                </div>
                <div class="col-md-3">
               <span class="glyphicon glyphicon-usd"></span>&nbsp;  <strong><?php echo '$'.$row['price'];?></strong>
                </div>
                <div class="col-md-3">
                <span class="glyphicon glyphicon-time"></span><ul style="list-style-type:none; margin:-20px 0 0 -18px;"><li> <?php echo $row['course_session'];?></li></ul>
                </div>
               <div class="clearfix"></div>
                 <div class="col-md-6" style="margin:12px 0 0 0; ">
                <span class="glyphicon glyphicon-map-marker"></span>&nbsp; <?php echo $row['location'];?>
                </div>
				<div class="col-md-6" style="margin:12px 0 0 0; ">
                <span class="glyphicon glyphicon-map-marker"></span>&nbsp; <?php echo $row['city'];?>
                </div>
                </div>
                <br/>
                <h4>Details</h4>
                <p><?php echo $row['course_description'];?>

                </p>
              
            </div>
            <div class="col-md-offset-10 col-sm-2">
             <a class="btn btn-primary" href="./course.php?cname=<?php echo $row['course_name'];?>">View details <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

					
					<?php
					}
					}else{
						
						echo "No criteria match !";
					}
					
					
					return true;
				
			}

		public function CourseDropdown($sql){
			
			
			$stmt=$this->db->prepare($sql);
				    $stmt->execute();
					if ($stmt->rowCount()>0){

					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					
					echo '<option value="'.$row['course_name'].'">'.$row['course_name'].'</option>';
					
					}
						
					}
					return true;
			
		}

}




