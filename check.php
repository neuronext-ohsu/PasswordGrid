<?php

##
#Page to check ID nubmer given by user
#Submitted by Ajax via submitForm() function in index.php
##

#Enable session for ID variable, reset if session already started (e.g. prevent back button use)

 if (session_status() == PHP_SESSION_NONE) {
   session_start();}
 else {
   session_destroy();
   header("location:index.php");}


#Database credentials inclusion - needs proper tree placement

 include 'db_connect.php';

#Sanitize input

 if(!preg_match('/\b[0-9]{5}\b/', $_POST['myData'])){exit;}


#PUll ID from saved session

 $_SESSION['subject_id'] = $_POST['myData'];
 $subject = $_SESSION['subject_id'];  


#Sanitize input, reset session if necessary

 if(!preg_match('/\b[0-9]{5}\b/', $subject)){exit;}
 if(!preg_match('/\b[0-9]{5}\b/', $_SESSION['subject_id'])){
   unset($_SESSION['subject_id']);
   session_destroy();
   exit;}

#Connect to database, initialize numrow

 $dbase = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
 $numrow = 0;


#Use $subject variable to check against ID list in database and close connection

 if($subject){
   $query = mysqli_query($dbase, "SELECT * FROM id WHERE SubID='$subject'");
   $numrow = mysqli_num_rows($query);}
 mysqli_close($dbase);


#If at least one instance of ID is found send to game, otherwise send error to index.php

 if($numrow == 0){
   $ID_found = array('found' => 0);
   echo json_encode($ID_found);}
 else{
   $ID_found = array('found' => 1);
   echo json_encode($ID_found);}



?>


