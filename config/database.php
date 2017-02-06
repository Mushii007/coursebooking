<?php

// Establishing  DB connection

$dbname='lms_course-booking';
$dbhost='localhost';
$dbuser='root';
$dbpass='';

try{

$DB_con = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 if ($DB_con){

 	//echo "DB Connected";
 }

}
catch(PDOException $e){

$e->getMessages();

}


// Defining Contants which will use in our whole application

define("BASE_URL", "http://localhost/coursebooking/");

//include './application/CourseClass.php';
include($_SERVER['DOCUMENT_ROOT'].'/coursebooking/application/CourseClass.php');
include($_SERVER['DOCUMENT_ROOT'].'/coursebooking/application/BookingClass.php');

$course = new CourseClass($DB_con);

$booking = new BookingClass($DB_con);