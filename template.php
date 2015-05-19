<!doctype html>

<!-- Main page with Concentration game, style sheets contained in css folder --->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>OHSU Concentration</title>
  <meta name="description" content="OHSU Concentration">
  <meta name="keywords" content="ohsu concentration" />

  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/quizymemorygame.css">


<!-- php to call ID from session variable, adjust game size and type if necessary -->
  
 <?php

 #Prior post code used to select came size and type of cards, will need regex sanitation if ever revisisted
//   $grid = $_POST['grid'];
//   $game = $_POST['game_1'];


 #Session control, return to index.php if session already exists

   if (session_status() == PHP_SESSION_NONE) {
      session_start();}
    else {
      session_destroy();
      header("location:index.php");}

 #Must have subject ID stored in session, else return to index.php

    if (!(isset($_SESSION['subject_id']))) {
      include("index.php");
      exit();}

 #Variable initialization for ID and game specifics, 

    $sub_id = $_SESSION['subject_id'];
    $grid = 46;
    $game = 'icon';
    $cols = substr($grid, 1);

 #Once sub_id is set, session variables are reset and session is killed

    unset($_SESSION['subject_id']);
    session_destroy();

 #Adjusts style sheet size based on gameboard size.  Currently fixed at 1170 width for 4x6 board size

    if ($cols=="4"){
      $pxSize = "780";}
    else if ($cols==5){
      $pxSize = "975";}
    else {
      $pxSize = "1170";}
  ?>  



<!-- Preliminary style setup for template.php, gameboard css handled under css folder -->

  <style>
    body{
      font-family:Helvetica, Arial, Verdana;
    }
    
    #tutorial-memorygame{
      margin:0px 0px 0px 50px;
      width:<?php echo $pxSize; ?>px;
    }
    
    .text-style1{
      font-size:14pt;
      color:#56605f;
      font-weight:normal;
      text-shadow: 1px 1px 1px #fff;
      margin:0;
      line-height:24pt;
    }

    .text-style2{
      fonst-size:12pt;
      text-align:center;
      font-family:Arial;
    }
    
  </style>

</head>





<body>
  
  <h1>OHSU Neurology - Concentration Task</h1>
  
  <div id="main" role="main">
    
 <!-- php script to get cards from list folder based on game and grid size -->

  <?php
    $listname = "lists/".$game."_".$grid.".php"; 
    include $listname; 
  ?>

 <!-- Script calls for relevant libraries, improptu not used in current iteration -->
    
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>
  <script src="js/jquery-ui-1.11.1.custom.min.js"></script>
  <script src="js/jquery-impromptu.js"></script>
  <script src="js/jquery.flip.min.js"></script>
  <script src="js/jquery.quizymemorygame.js"></script>

 <!-- Call for initialization of quizyMemoryGame.jss variables including grid size and type -->
  
  <script>
    $('#tutorial-memorygame').quizyMemoryGame({itemWidth: 156, itemHeight: 156, itemsMargin:40, colCount:<?php echo $cols; ?>, animType:'flip' , flipAnim:'tb', animSpeed:250, resultIcons:true, gridSize:'<?php echo $grid; ?>', gameType:'<?php echo $game; ?>', subID:'<?php echo $sub_id?>'});
  </script>

  <div><a href="index.php" class="text-style2" >Restart</a><br><br></div>
  <div><a href="acknowledgements.php" target="_blank" class="text_style2">Acknowledgements</a><br<br></div>

</body>
</html>