
<?php
error_reporting(0);
$data = file_get_contents("http://localhost/project/main_/display.php");
$regex = $_POST["search"];    
 
$m = new MongoClient();
$db = $m->test; //Change to your database
$collection = $db->files;

 if (isset($_POST["submit"])) {
   /*if (preg_match('/' . preg_quote($regex). '/i', $data)) {
     
     	//$collection->find(array('name'=> array('$regex' => 'm'));
   	 echo "not found";

}  */
  // else {
//echo "not found";
    $data="<style> table, th, td { border: 1px solid black; }</style>"
    $data  = "<table style=" border: 1px solid white ";
    $data .= "border-collapse:collapse">";
    $data .= "<thead>";
    $data .= "<tr>";
    $data .= "<th>Author</th>";
    $data .= "<th>Title</th>";
    $data .= "<th>Uploader</th>";
    $data .= "<th>Link</th>";
    $data .= "</tr>";
    $data .= "</thead>";
    $data .= "<tbody>";


    $cursor = $collection->find();
   // iterate cursor to display title of documents
	
   foreach ($cursor as $document) {
      //echo $document["title"] . "\n";
       $data .= "<tr>";
            $data .= "<td>" . $document["author"] . "</td>";
            $data .= "<td>" . $document["title"]."</td>";
            $data .= "<td>" . $document["uploader"]."</td>";
            $data .= "<td>" . $document["url"]."</td>";
            $data .= "</tr>";
   }
   $data .= "</tbody>";
        $data .= "</table>";
        echo $data;
}
?>