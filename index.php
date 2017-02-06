<?php
include "header.php";
?>

    <!-- Page Content -->
    <div class="container">


        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <!-- <h1 class="page-header">Page Heading
                    <small>Secondary Text</small>
                </h1> -->
                <div class="jumbotron">
                      <h1 class="text-center">LMS Course Booking Portal</h1>
                      <p class="text-center">Enroll your desired course in few clicks and get professional in makeup industry.</p>
                      <!-- <p><a class="btn btn-primary btn-lg">Learn more</a></p> -->
                </div>
            </div>
        </div>
        <!-- /.row -->
<!--filter form  -->
        <div class="row">
            <div class="col-lg-12 col-md-12 search-filters">

            <fieldset class="scheduler-border">
            <legend class="scheduler-border"><h3>Search by:</h3></legend>
            <form action = "search.php" name= "filter-form" method="post" id="search-form">
                
            <div class="row">
				
				
				<div class="col-md-3">
                
                <div class="form-group">
                <select name="coursename" class="form-control">
                <option value="">Search by Course</option>
                <?php
					$sql= "SELECT DISTINCT `course_name` FROM courses";
					$course->CourseDropdown($sql);
				?>
				</select>        
                </div>
                

                </div>
				
				
               <div class="col-md-3">
                <div class="form-group">
                <select name="month" class="form-control">
                <option value="">Select month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                </select>
                </div>
                </div>
				
				<!--Course dropdown-->
					<div class="col-md-3">
                
                    <div class="form-group">
                <select name="city" class="form-control">
                <option value="">Search by Location</option>
                <option value="London">London</option>
                <option value="Liverpool">Liverpool</option>
                <option value="Manchester">Manchester</option>
                </select>        
                </div>
                

                </div>
				<!--Ends course name-->
				
				
                <div class="col-md-3">
                <div class="form-group">
                <select name="Session" class="form-control">
                <option value="">Search by Session</option>
                <option value="Morning(9:00AM-12:00PM)">Morning</option>
                <option value="Noon(12:30PM-3:30PM)">Afternoon</option>
                <option value="Evening(4:00PM-7:00PM)">Evening</option>
                </select>        
                </div>
                </div>
                

                 <div class="col-md-3">
                
                    <div class="form-group">
                    <label></label>
                <input type="submit" name="filtercourse" class="btn btn-primary" value="Search" id="searchBtn" >
                <input type="button" name="filtercourse" class="btn btn-primary" value="Reset" onclick="ResetForm()">
                
				</div>
                

                </div>
            </div>



            </form>


            </fieldset>

            </div>

        </div>
<div class="tutorial_list">
<?php 
$query= "SELECT * FROM courses ORDER BY course_id DESC LIMIT 2";

$course->courseList($query);


?>
</div>
       <?php echo "Version:".phpversion();?>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
			
			
			
               <!-- <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>-->
            </div>
        </div>
<script type="text/javascript">
$(document).ready(function(){
	$(document).on('click','.show_more',function(){
		var ID = $(this).attr('id');
		$('.show_more').hide();
		$('.loding').show();
		$.ajax({
			type:'POST',
			url:'ajax2.php',
			data:'course_id='+ID,
			success:function(html){
				$('#show_more_main'+ID).remove();
				$('.tutorial_list').append(html);
			}
		});
		
	});
	
	// search form submitting
	
	/* var working = false;
    $("#searchBtn").click(function(){
    $.ajax({
         type: 'POST',
         url: "search.php",
         data: $('#search-form').serialize(), 
         success: function(response) {
            alert("Submitted comment"); 
             $("#tutorial_list").append(response);
         },
        error: function() {
             //$("#commentList").append($("#name").val() + "<br/>" + $("#body").val());
            alert("There was an error submitting comment");
        }
     });
});
	*/
	
});
</script>
        <!-- /.row -->

<?php 
include "footer.php";

?>