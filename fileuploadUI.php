  <html>
  <body>
  <form action="" enctype="multipart/form-data" method="post" 
      name="uploadfile">File uploaded：<input type="file" name="upfile" /><br> 
      <input type="submit" value="upload" /></form> 
      <?php 
      //print_r($_FILES["upfile"]); 
      if(is_uploaded_file($_FILES['upfile']['tmp_name'])){ 
      $upfile=$_FILES["upfile"]; 
      
      $name=$upfile["name"];
      $type=$upfile["type"];
      $size=$upfile["size"];
      $tmp_name=$upfile["tmp_name"];
      
      switch ($type){ 
      case 'image/pjpeg':$okType=true; 
      break; 
      case 'image/jpeg':$okType=true; 
      break; 
      case 'image/gif':$okType=true; 
      break; 
      case 'image/png':$okType=true; 
      break; 
      } 
      if($okType){ 
      
      $error=$upfile["error"];
      echo "================<br/>"; 
      echo "File name：".$name."<br/>"; 
      echo "File type：".$type."<br/>"; 
      echo "File size：".$size."<br/>"; 
      echo "Value after upload：".$error."<br/>"; 
      echo "Files tempeoray path：".$tmp_name."<br/>"; 
      echo "Start moving uploading files<br/>"; 
      move_uploaded_file($tmp_name,'up/'.$name); 
      $destination="up/".$name; 
      echo "================<br/>"; 
      echo "Upload message：<br/>"; 
      if($error==0){ 
      echo "Image uploaded successful！"; 
      echo "<br>Preview:<br>"; 
      echo "<img src=".$destination.">"; 
      //echo " alt=\"Preview:\rdocument:".$destination."\rupload time:\">"; 
      }elseif ($error==1){ 
      echo "Files over limit，Please edit in php.ini"; 
      }elseif ($error==2){ 
      echo "Files over MAX_FILE_SIZE value"; 
      }elseif ($error==3){ 
      echo "Only part of files are uploaded"; 
      }elseif ($error==4){ 
      echo "No file is uploaded"; 
      }else{ 
      echo "Size of file is 0"; 
      } 
      }else{ 
      echo "Please upload image of jpg,gif,png！"; 
      } 
      } 
      ?>
      </body>
      <html>
