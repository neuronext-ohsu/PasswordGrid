<!doctype html>

<!-- Primary index page for concentration app -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>OHSU Neurology Concentration</title>
  <meta name="description" content="OHSU Concentration">
  <meta name="keywords" content="ohsu concentration" />
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/quizymemorygame.css">
  
  <style>
    body{
      font-family:Helvetica, Arial, Verdana;
    }

    .text-style2{
      font-size:13pt;
      text-align:left;
      font-family:Arial;
    }

    .text-style1{
      margin: 0px 0px 0px 100px;
    }

  </style>
</head>





<body>


<!-- JavaScript functions -->

<script language="JavaScript">
<!--

//Array containing game descriptions, held over from initial versions of website

  var num_of_cats = 6;
  var text_array = new Array(num_of_cats);
    text_array[0] = "Welcome to OHSU Neurology's Concentration Task.  Please select a game type and grid size from the menus below."; 
  (event.preventDefault) ? event.preventDefault() : event.returnValue = false;

//Function called after user submits ID to the input form
    
function submitForm(){
  if (window.document.form_1.game_id.value == ""){                      //Warning if ID is blank
    event.preventDefault();
    alert("Please input your subject ID");}

  else{
    var rgxp_pat = /\b[0-9]{5}\b/;                                      //Sanitize, ID must be five digit numeric
    if (!(rgxp_pat.test(window.document.form_1.game_id.value))){
      event.preventDefault();
      alert("Please input your 5 digit subject ID");}

    else{								
	event.preventDefault();
	var check_id = window.document.form_1.game_id.value;            //Set ID variable only if passes sanitize step
	$.ajax({							//Ajax call to check.php
	  type: "POST",
	  dataType: 'json',						  //JSON encoding
	  url: "check.php",
	  data: {myData:check_id},
	  success: function(data){					  //Logic gate based on returned value from check.php
	    if(data.found==1){
	      window.location.href='template.php';}			  //If ID was found, proceed to game in template.php
	    else{
	      alert("Subject ID not found")}}});
}}}  

//-->


</script>





<!-- php script for session control and initialization of ID variable used by check.php -->

<?php

    if (session_status() == PHP_SESSION_NONE) {
      session_start();}
    else {
      session_destroy();
      header("location:index.php");}
    error_reporting(E_ALL ^ E_NOTICE);
    $_SESSION['subect_id'] = "";
?>





<!-- onSubmit runs Ajax script in function submitForm -->

<div id="outerDiv">
  <h1>OHSU Neurology - Concentration Game</h1>
  <div id="innerDiv">
    <form name="form_1" onSubmit="submitForm();" class="text-style1">
      <textarea WRAP="virtual" name="textarea_1" rows=4 cols=40 class="text-style2">Welcome to OHSU Neurology's Concentration Task.  You will be tasked with matching eight pairs of icons as quickly as possible.  Please enter your subject ID before continuing.</textarea><br /><br> 
      Subject ID: <input type="text" name="game_id", value="">
      <input type="submit" value="Begin game">
    </form>
  </div>
</div>  

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>


</body>
</html>