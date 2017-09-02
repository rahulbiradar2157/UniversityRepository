

 <!DOCTYPE html>
 <html>
 <head>
 	<title>display files</title>
 	<style>
 	html {
  background-color: white;
  font-family: "Tenor Sans", sans-serif;
}
 body{
	marker-mid: initial;
	background-color: grey;
    margin-left: 150px;
    margin-right: 150px;
    margin-top: 50px;
}

h1{
	font-style: serif;
	color: white;
	text-shadow: 0 0 3px #FF0000;
    background-color: #5D92BA;
    padding: 25px;
    margin-top: -6px;

}

.mystyle { 
    background: #FFFF;
    height: 10px;
    margin: 100px;
    max-width: 1600px;
    line-height:25px;
    position: relative;
    width: 84%;
    font-family:arial; font-size:14px; font-weight:bold; padding:10px; padding-top:40px;
    -webkit-box-shadow: 0 1px 7px hsla(0,0%,0%,.2);
       -moz-box-shadow: 0 1px 7px hsla(0,0%,0%,.2);
            box-shadow: 0 1px 7px hsla(0,0%,0%,.2);
            }

table, th, td {
    border: 2px solid black;
    border-collapse: collapse;
}
</style>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script src="../js/jquery-3.1.1"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

<style type="text/css">
   
</style>

<div class="container">
    <div class="jumbotron" id="headerBox">
        <div class="row">
            <div class="col-sm-3" id="logoBox"><center><img id="universityLogo" src="../img/Batu_logo4.png"></center></div>
            <div class="col-sm-9">
            <div id="pageHeading">Dr Babasaheb Ambedkar Technological University,Lonere</div>
            <div id="subHeadingSmall">(Autonoumous)</div>
            <div id="subHeading">Institutional Repository for DBATU Lonere</div>
        </div>
        </div>
    </div>
     <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://dbatuonline.com/">University Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="logindex.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
         <li class="active"><a href="display.php"><span class="glyphicon glyphicon-download">Archive</a></li>
        <li><a href="upload.html"><span class="glyphicon glyphicon-upload">Upload</a></li>
         </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://www.dbatuonline.com/contact.php"><span class="glyphicon glyphicon-user"></span> Contact us </a></li>
      
	  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      
	  </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>

</div>


<div id="header-text">
            <marquee>
                <FONT SIZE="3" COLOR="#ffffff">
                    <B>Welcome to Institutional Repository System of Dr. Babasaheb Ambedkar Technological University, Lonere</B>
                </FONT>
            </marquee>
      </div>
<?php
    
    try{
        // Connecting to server
        $c = new MongoClient();
    }catch(MongoConnectionException $connectionException){
        print $connectionException;
        exit;
    }
 
    $data  = "<table class='mystyle' style='margin-top: -17px;margin-left: 105px; padding-right: 105px;'>";

    $data .= "<thead>";
    $data .= "<tr>";
    $data .= "<th><i><strong> &nbsp&nbsp author</strong></i></th>";
    $data .= "<th><i><strong> &nbsp&nbsp title</strong></i></th>";
    $data .= "<th><i><strong> &nbsp&nbsp uploader</strong></i></th>";
	$data .= "<th><i><strong>&nbsp&nbsp Downloadlink</strong></i></th>";
    $data .= "</tr>";
    $data .= "</thead>";
    $data .= "<tbody>";
 
    try{
        $db = $c->test;
        $collection = $db->files;
        $cursor = $collection->find();
        foreach($cursor as $document){
            $data .= "<tr>";
            $data .= "<td>" . $document["author"] . "</td>";
            $data .= "<td>" . $document["title"]."</td>";
            $data .= "<td>" . $document["uploader"]."</td>";
			$data .= "<td>";
			$link=$document["url"];
			$data .= "<a href=$link>";
			 $data .= "Download </a>";
            $data .= "</td>";
			$data .= "</tr>";
        }
        $data .= "</tbody>";
        $data .= "</table>";
        echo $data;
 
    }catch(MongoException $mongoException){
        print $mongoException;
        exit;
    }





?>
<br>
<div class="container">
	
	<footer class="text-muted well" id="last-footer">
		<section>
		<div class="row" style="font-size:11px;">
		<div class="container">
		<h3 class="subhead" style="text-align:center;">All We Need Is Your Support</h3>
		   <div class="col-md-9">
        <div class="row" >
			<div class="col-md-3">
			<div class="row footlinks">
			<div class="col-xs-12">
			<ul class="noBullets">
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/page.php?quick_id=3">Vice-Chancellor's Page</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/page.php?quick_id=4">B. Tech Admissions</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://admissions.dbatuonline.com/">Ph. D/M.Tech Admissions</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/page.php?quick_id=10">Training & Placement</a></li>
			</ul>
			</div>
			</div>
			</div>
			<div class="col-md-3">
			<div class="row footlinks">
			<div class="col-xs-12">
			
			<ul class="noBullets">
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/1">Degree Verification</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/">Citizen Charter</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://dbatuonline.com/admin/uploads/1392461161.pdf">Right to Information</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/page.php?quick_id=18">TEQIP</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://dbatuonline.com/admin/uploads/1470393854.pdf">Ordinances</a></li>
			
			</ul>
			</div>
			</div>
			</div>
			<div class="col-md-3">
			<div class="row footlinks">
			<div class="col-xs-12">
			
			<ul class="noBullets">
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/page.php?quick_id=19">Convocation</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/page.php?quick_id=20">Tender Notice</li>
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/admin/uploads/1434626191.pdf">Academic Calendar</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://www.cec.nic.in/">CEC</li>
			<li><i class="fa fa-angle-right"></i><a href="http://dbatuonline.com/admin/uploads/1470393888.pdf">Statutes</li>
			
			
</ul>
			</div>
			</div>
			</div>
			<div class="col-md-3">
			<div class="row footlinks">
			<div class="col-xs-12">
			<ul class="noBullets">
			<li><i class="fa fa-angle-right"></i><a href="http://www.sakshat.ac.in/">SAKSHAT</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://www.dbatuonline.com/page.php?quick_id=28">Syllabi, Rules & Regulations</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://dbatuonline.com/iope/">IOPE</a></li>
			<li><i class="fa fa-angle-right"></i><a href="http://dbatuonline.com/admin/uploads/1470393933.pdf">First Rules and Regulations</a></li>
			
			</ul>
			</div>
			</div>
			</div>
			<hr/>			
        </div><!--/.row inner--> 
		</div>
		
    
		<footer>	<div class="row">
			<div class="container text-center">
				<h5>All Rights Reserved © 2017.</h5>
			</div>
			</div></footer>
			 </div><!--/.container--> 
			 </div><!--/.row outer--> 
		</section>
				</footer>				
	
</div> 
 </body>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
</html>

 