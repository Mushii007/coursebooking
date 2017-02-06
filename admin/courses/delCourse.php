<?php
include_once '../partials/header.php'; 
include_once '../partials/sidebar.php'; 






if(isset($_POST['btn-del']))
{
 $cid = $_GET['del_id'];
 $course->delCourse($cid);
// header("Location: delCourse.php?deleted"); 
echo '<script type="text/javascript">alert("Deleted");</script>';

}

/*if(isset($_GET['deleted'])){



}
*/

?>

<div id="page-wrapper">

            <div class="container-fluid">

            <?php
            if(isset($_GET['del_id'])){
            $stmt = $DB_con->prepare("SELECT * FROM courses WHERE course_id=:id");
         	$stmt->execute(array(":id"=>$_GET['del_id']));
         while ($row=$stmt->fetch(PDO::FETCH_BOTH)){


         	echo "<label> Serial # : </lable> ".$row['course_id']."<br/>";
         	echo "<label> Course Name : </label> ".$row['course_name']."<br/>";
         }

			}



            ?>

<p>
<?php
if(isset($_GET['del_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['course_id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="<?php echo BASE_URL; ?>" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
 <?php
}
else
{
 ?>
    <a href="<?php echo BASE_URL; ?>admin" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>


			</div>

</div>





 <?php        include '../partials/footer.php';?>