<?php
  if (isset($_POST)){
  $username = $_POST['user'];
  $pass = $_POST['password'];
}
 $m = new MongoClient();

   
$db = $m->mydb;
$collection = $db->mycol;
$n = $collection->find(array('roll_no' => $username)); //Does a search for Usernames with the posted Username Variable


 $roll_no = null;
 $password = null;


foreach($n as $userFind) 
{
				    $roll_no = $userFind['roll_no'];
				    $password = $userFind['password'];
				}
if($username == $roll_no && $password == $pass){ 
					header('location:upload.html');
					 $_SESSION['login_user']=$username;
				}
			else{
   
				header('location:login.html');
				}
				
			?>

