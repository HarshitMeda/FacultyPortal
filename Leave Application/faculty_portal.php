<?php 
session_start();
 //require_once('connection.php');
 //$document = $collection->findOne(['user_id'=>'annita_alting']);
 $username =$_SESSION["user_id"];
 $db = pg_connect("host=localhost port=5432 dbname=postgres
  user=postgres password=postgres");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?php $username ?> Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">

    <!-- Bootstrap core CSS -->
<!-- <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      p.big{
        line-height: 1.5;
      }
      p.small{
        line-height: 1.5;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
  <div class="navbar navbar-dark bg-dark shadow-sm">
  <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        
        <strong>FACULTY PORTAL</strong>
      </a>
      </div>
      </div>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#"></a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#"></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
       <!-- <a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>-->
        <a class="btn btn-lg btn-outline-secondary" href="destroy.php"><?php if(isset($_SESSION["user_id"])){if(strcmp($_SESSION["user_id"],$username)==0){echo "Log out";}}?></a>
      </div>
    </div>
  </header>

  
      <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
     <!-- <a class="p-2 text-muted" href="edit_annita.php"><?php //if(isset($_SESSION["user_id"])){if(strcmp($_SESSION["user_id"],$username)==0){echo "Edit Profile";}}?></a>
      <a class="p-2 text-muted" href="#">U.S.</a> -->
      <?php if(isset($_SESSION["user_id"])){if(strcmp($_SESSION["user_id"],$username)==0){echo' <div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Leave Application
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a  class="dropdown-item" href="leave/leave_application.php">Apply Leave</a></li>
    <li><a class="dropdown-item" href="leave/leave_status_user.php">Leave Status</a></li>
    <li><a class="dropdown-item" href="leave/approve_leave.php">Approve Leave</a></li>
  </ul>
</div>';}}?>
    </nav>
  </div>
   
   <?php
     $sql="select user_id from faculty where designation = 'director'";
     $ret = pg_query($db, $sql);
     $dir=pg_fetch_row($ret);
     if(strcmp($_SESSION["user_id"],$dir[0])==0)
     {
       echo'<div class="nav-scroller py-1 mb-2">
       <nav class="nav d-flex justify-content-between">';

       if(isset($_SESSION["user_id"])){if(strcmp($_SESSION["user_id"],$username)==0){echo' <div class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Appoint HOD/DFA
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a  class="dropdown-item" href="leave/appoint_hod.php">Change HOD </a></li>
          <li><a class="dropdown-item" href="leave/appoint_dfa.php">Change DFA</a></li>
          
        </ul>
      </div>
      </nav>
      </div>'
    ;}}
     }

   ?>
  
     <!-- <a class="p-2 text-muted" href="edit_annita.php"><?php //if(isset($_SESSION["user_id"])){if(strcmp($_SESSION["user_id"],$username)==0){echo "Edit Profile";}}?></a>
      <a class="p-2 text-muted" href="#">U.S.</a> -->
      
   
  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-12 px-0">
      <?php
      $sql="select * from faculty where user_id = '$username'";
      $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } 
      $row=pg_fetch_row($ret);
      //echo $username." \n";
      ?>
     
      
     <blockquote class="blockquote text-center">
     <?php
   echo '<h1  class="text-center">'.'Welcome '.$row[0].'<br> <br>'.' </h1>'; ?>
   </blockquote>
   <?php
    echo '<h4 class ="display-5">'.'Name : '.$row[1].'<br><br>'.'Designation : '.$row[2].'<br><br>'.'Department : '.$row[3].'<br><br>'.'Leaves Remaining : '.$row[4].'<br>';?>
    
    </div>
  </div>

 

<div>
  <div>
    <div>
      <!--<h3 class="pb-4 mb-4 font-italic border-bottom">
        Academic Profile
      </h3>

      
      <div>
-->
        <?php
          /*$collection2 = $db->annita;
          $cursor = $collection2->find();

          foreach($cursor as $document2)
          {
              echo '<h3>'.$document2['title'].'</h3><br>';
              echo '<p>'.$document2['content'].'</p>';    
          }


         */
        ?>
</div>
  </div><!-- /.row -->

</main><!-- /.container -->
<!--
<footer class="blog-footer">
  <!-- <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p> 
    <a href="#">Back to top</a>
  </p>
</footer>-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
