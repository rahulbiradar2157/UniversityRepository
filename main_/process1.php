<?php
  if (isset($_POST)){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $roll_no = $_POST['roll_no'];
  $password = $_POST['password'];
}
    $m = new MongoClient();
  
   // select a database
   $db = $m->mydb;
   $collection = $db->mycol;
  
   $document = array( 
      "name" => $name,
      "email" => $email, 
      "roll_no" => $roll_no,
      "password"=>$password,
   );
  
   $collection->insert($document);
   header('location:login.html');

?>
