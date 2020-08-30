<?php
error_reporting(0);
   if(isset($_FILES['document'])){
      $errors= array();
      $file_name = $_FILES['document']['name'];
      $file_size =$_FILES['document']['size'];
      $file_tmp =$_FILES['document']['tmp_name'];
      $file_type=$_FILES['document']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['document']['name'])));
      
      $extensions= array("pdf","txt","xlsx","xls","docx");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, document file only";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"document/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
	  <h3><a href="open_leads.php">Back to Portal</a></h3>
         <input type="file" name="document" />
         <input type="submit"/>
      </form>
      
   </body>
</html>