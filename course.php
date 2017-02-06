<?php
include "header.php";
session_start();
?>

    <!-- Page Content -->
    
    <?php 
if(isset($_GET['c_id']))
{
 $id = $_GET['c_id'];
 extract($course->get_courses_ids($id)); 
}
if (isset($_GET['cname'])){

$stmt = $DB_con->prepare("SELECT * FROM courses WHERE course_name=:course_name LIMIT 1");
        $stmt->execute(array(":course_name"=>$_GET['cname']));
   
while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {

         

    ?>
    <div class="container inside-content">
<div class="row">
             
            <div class="col-md-10 ">
                <h3 class="course-title"><?php echo $row['course_name'];?></h3>
                <div class="row">
               
                <div class="col-md-3">
                <span class="glyphicon glyphicon-calendar"></span>&nbsp;  <?php echo date('l', strtotime($row['course_date'])).",&nbsp;".date("j F, Y",strtotime($row['course_date']));?>&nbsp;&nbsp;<?php //echo $row['start_time'];?> - <?php //echo $row['end_time'];?>
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
                <span class="glyphicon glyphicon-time"></span>&nbsp;  <?php echo $row['course_session'];?>
                </div>
               <div class="clearfix"></div>
                 <div class="col-md-6" style="margin:12px 0 0 0; ">
                <span class="glyphicon glyphicon-map-marker" ></span>&nbsp; <span id="address"><?php echo $row['location'];?></span>
                </div>
				<div class="col-md-6" style="margin:12px 0 0 0; ">
                <span class="glyphicon glyphicon-map-marker"></span>&nbsp; <?php echo $row['city'];?>
                </div>
                </div>
                <br/>

                <div class="row">
                <div class="col-md-8">
                <h4>Details</h4>
                <p><?php echo $row['course_description'];?>

                </p>
                </div>
                <div class="col-md-4">

                <!--<a href="#">
                    <img class="img-responsive" src="<?php echo BASE_URL;?>img/test.jpg" alt="">
                </a>-->
         

<h4>Location</h4>

<div id="map" style="width:100%;height:300px"></div>

<script>
/*function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(53.4748049,-2.2489717), 
    zoom: 10
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
}*/

/*function locPopup(){

    var loca = document.getElementById('address').innerText;   // var a =loca.innerHTML; 
    alert(loca);


}
*/
//window.onload = locPopup;

var geocoder;
var map;
var infowindow;

function initialize() {
  geocoder = new google.maps.Geocoder();
  var loca = new google.maps.LatLng(41.7475, -74.0872);

  map = new google.maps.Map(document.getElementById('map'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: loca,
    zoom: 18
  });

}

function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'mouseover', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}

function codeAddress() {
  var address = document.getElementById("address").innerText;
  geocoder.geocode({
    'address': address
  }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });
      var request = {
        location: results[0].geometry.location,
        radius: 50000,
        name: 'ski',
        keyword: 'mountain',
        type: ['park']
      };
      infowindow = new google.maps.InfoWindow();
      var service = new google.maps.places.PlacesService(map);
      service.nearbySearch(request, callback);
    } else {
      alert("Geocode was not successful for the following reason: " + status);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

window.onload = codeAddress;


</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAe-ARudjWN96j8uftrxmHzUYO_rvP4tBw"></script>-->

                </div>
              </div>
            </div>
            </div>
<!-- Sessions selection forms -->

<!--            <form role="form" action="" method="post" id="course_form">


<div class="row">
<div class="col-md-6">
                            <div class="form-group">
                                <label>Course Name</label>
                                <input type="text" class="form-control" name="c_name" id="course_name">
                                
                            </div>
                            </div>
        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course Description</label>
                                <textarea class="form-control" name="c_desc" id="course_desc" placeholder="Enter text"></textarea>
                         </div>
        </div>
</div>-->



            <div class="row booknow-btn">
            <div class="col-md-offset-4 col-sm-2">
             <a class="btn btn-primary" href="booking.php?course-name=<?php echo $row['course_name'];?>">Book Now <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            </div>
            
      
<div >
    <?php
 $_SESSION['courseid'] = $row['course_id'];
 $_SESSION['coursename'] = $row['course_name'];
 $_SESSION['description'] = $row['course_description'];
 $_SESSION['location'] = $row['location'];
 $_SESSION['price'] = $row['price'];

    ?>
</div>
       
<?php



}
}

?>
        
        <!-- /.row -->


        <!-- Pagination -->
      <!--   <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
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
                </ul>
            </div>
        </div>
       -->  <!-- /.row -->

<?php 
include 'footer.php';
?>