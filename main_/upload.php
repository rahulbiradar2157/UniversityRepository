<?php
     
	$m = new MongoClient();
	$db = $m->test; //Change to your database
	$collection = $db->files; //Change to your collection
	$cursor = $collection->find();
        $upload_dir = "../htdocs"; //Specified the upload directory
        
        
        if(isset($_POST['submit'])){ //Checks if the upload form has been submitted, if so, continue
        
        $arr = array($_FILES["file"]); //Begins the array for the file uploads
            foreach ($arr as &$value) {
                
                if ($value["error"] > 0){
                    //Error uploading the file, script stops here
                }else{
                    
                if (file_exists($upload_dir . $value["name"])){
                    //Error uploading the file, a file with the same name already exists, script stops here
                  } else {
                  move_uploaded_file($value["tmp_name"], $upload_dir. $value["name"]);
                    $successful = 1; //Sets the upload flag to 1, will display sucsess message below upload form      
              
                    $url = "../htdocs" . $value["name"]; //Places the Upload Path into the URL varliable
                    $unique_id = "content".rand(); //Generates a random ID and stores in within the unique_id variable
                    
                    $obj = array( "url" => $url, "unique_id" => $unique_id,); //Adds the URL and Random ID to Mongo
                    $collection->insert($obj);
                    
                  }
                }
        } //Ends the array
        unset($value); //Unsets the value variable from the array
         }else{
            //If the submit form is not submitted, do nothing
            }
 ?>
