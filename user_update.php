<?php
    session_start();
    if(@$_SESSION['username'] == NULL){
        echo "<!DOCTYPE html>";
            echo "<html>";
            echo "<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">";
            echo "<body style=\"background-color:black\">";
            echo "<center>";
            echo "<div class=\"jumbotron\" style=\"background-color:black\">";
            echo "<a href=\"user_login.php\">";
            echo "<h1 class=\"btn btn-danger\" style=\"color:white\">#ERROR #GO TO LOGIN NOW</h1>";
            echo "</a>";
            echo "</div>";
            echo "</center>";
            echo "</body>";
            echo "</html>";
    }else{
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบผู้เชี่ยวชาญการปฐมพยาบาล</title>
    <!-- Favicons (created with http://realfavicongenerator.net/)-->
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="img/favicons/manifest.json">
	<link rel="shortcut icon" href="img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <!--<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    <!--<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>-->
    <!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php
	require 'connect_db.php';
  ?>

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"">ระบบผู้เชี่ยวชาญการปฐมพยาบาล</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">หน้าแรก</a></li>
            <li class="active"><a href="about.php">เกี่ยวกับ</a></li>
            <li><a href="docs/manual.pdf" target="_blank">คู่มือการใช้งานระบบ</a></li>
           <!-- <li><a href="#contact">ความรู้ทั่วไป</a></li> -->
						<li><div class="dropdown">
  <button class="btn" type="button" data-toggle="dropdown"><?php echo "Welcome: ".$_SESSION['username']; ?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="user_update.php">แก้ไขข้อมูล</a></li>
  </ul>
</div></li>
            <li><a href="user_logout.php">ออกจากระบบ</a></li>
          </ul>
       
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<?php

        $sql = "SELECT id,username,password,nick_name FROM user WHERE nick_name='".$_SESSION['username']."'";
        $result = $connect_db->query($sql);
		$row = $result->fetch_assoc();

	?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>แก้ไขข้อมูลผู้ใช้</h2>

      </div>
	  <form class="form-horizontal" method="GET" action="user_update_process.php">
  <div class="form-group">
	<input type="hidden" name="id" value="<?php echo $row["id"];?>">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-10">

      <input type="username" class="form-control" id="username" name="username" placeholder="โปรดกรอก Username" required value="<?php echo $row["username"];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="password" name="password" placeholder="โปรดกรอก Password" required value="<?php echo $row["password"];?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="nickname">Nickname:</label>
    <div class="col-sm-10"> 
      <input type="nickname" class="form-control" id="nickname" name="nickname" placeholder="โปรดกรอก Nickname" required value="<?php echo $row["nick_name"];?>">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>

    </div> <!-- /container -->

<?php

 $connect_db->close();
?>
 



    <!-- Bootstrap core JavaScript
    ================================================== -->
     <br /><br /><br /><footer>
       <p class="copyright text-muted">&copy; 2017 All Rights Reserved. Powered by <a href="https://www.facebook.com/un4ckn0wl3z" target="_blank">Anuwat</a> and <a href="https://www.facebook.com/suttawee555?fref=ts" target="_blank">Suttawee</a></p><br /><br /><br /><br />

    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

    
  </body>
</html>

<?php

}

?>
