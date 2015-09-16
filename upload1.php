<?php


  //echo "<pre>";
  //var_dump($_FILES);
 // echo "</pre>";
 	

  $upfile=$_FILES['fileup'];
  $tmpfilename=$upfile['tmp_name'];
  $filename=$upfile['name'];
  $filetype=$upfile['type'];
  $filesize=$upfile['size'];

  $localhost="localhost";
  $servername="root";
  $password="123456";
  $databasename="mediavault";


  $link=mysql_connect($localhost,$servername,$password);

    if(!$link){

        die("Failed to connect to database...");

    }


    mysql_select_db($databasename,$link);

    @$sql="insert into media values('$filename','$tmpfilename','$filetype','filesize')";

    if(file_exists("upload/".$name)){

        echo "Sorry, file is already exists.";  

    }


    if(!mysql_query($sql,$link)){

      echo "There is not complete information";
    }

    else {

        echo " Media file has been stored in the database successfully";
    }

  



    if(mysql_query($sql)){

             move_uploaded_file($tmpfilename,"upload/".$name);
    	       echo "<script> {window.alert({$filename}'has been uploaded successfully');location.href='upload1.html'} </script>;"

    	     
    }



    mysql_close($link);
?>


