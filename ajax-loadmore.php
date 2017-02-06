<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'lms_course-booking';

//connect and select db
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(isset($_POST["course_id"]) && !empty($_POST["course_id"])){

//include database configuration file
//include('db_config.php');

//count all rows except already displayed
$queryAll = mysqli_query($con,"SELECT COUNT(*) as num_rows FROM courses WHERE course_id < ".$_POST['course_id']." ORDER BY course_id DESC");
$row = mysqli_fetch_assoc($queryAll);
$allRows = $row['num_rows'];

$showLimit = 2;

//get rows query
$query = mysqli_query($con, "SELECT * FROM courses WHERE course_id < ".$_POST['course_id']." ORDER BY course_id DESC LIMIT ".$showLimit);

//number of rows
$rowCount = mysqli_num_rows($query);

if($rowCount > 0){ 
    while($row = mysqli_fetch_assoc($query)){ 
        $tutorial_id = $row["course_id"]; ?>
<div class="row">
            <!-- <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div> -->
            <div class="col-md-10 ">
                <a class="course-title-link" href="./course.php?cname=<?php echo $row['city']."-".$row['course_name'];?>"><h3 class="course-title"><?php echo $row['course_name']?></h3></a>
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

        <hr><?php } ?>
<?php if($allRows > $showLimit){ ?>
    <div class="show_more_main" id="show_more_main<?php echo $tutorial_id; ?>">
        <span id="<?php echo $tutorial_id; ?>" class="show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading…</span></span>
    </div>
<?php } ?>  
<?php 
    } 
}
?>