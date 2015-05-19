<?php

##
#Page called by Ajax to write game results to database
##


#Posting and initialization of input variables
 
 $email = $_POST['email'];
 $clicks = $_POST['clicks'];
 $time = $_POST['time'];
 $game = $_POST['game'];
 $grid = $_POST['grid'];
 $today = date('m\/d\/Y');
 $curr_time = date('H:i:s');


#Sanitize input

 if(!preg_match('/\b[0-9]{5}\b/', $email)){exit;}
 if(!preg_match('/\b[0-9]+\b/', $clicks)){exit;}
 if(!preg_match('/\b[0-9]+\b/', $time)){exit;}
 if(!preg_match('/\b(color|icon|gray|word|flag)\b/', $game)){exit;}
 if(!preg_match('/\b(34|44|45|46)\b/', $grid)){exit;}


#Database connection/writing

#Database credentials inclusion - needs proper tree placement
 include '../db_connect.php';

#Connect to database
 $dbase = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

#Insert statement for results into database
 mysqli_query($dbase, "INSERT INTO results VALUES ('$email', '$today', '$curr_time', '$clicks', '$time', '$game', '$grid')");

#Close database
 mysqli_close($dbase);


?>