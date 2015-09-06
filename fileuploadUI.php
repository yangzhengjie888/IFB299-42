  <html>
  <body>
  <form action="" enctype="multipart/form-data" method="post" 
      name="uploadfile">上传文件：<input type="file" name="upfile" /><br> 
      <input type="submit" value="上传" /></form> 
      <?php 
      //print_r($_FILES["upfile"]); 
      if(is_uploaded_file($_FILES['upfile']['tmp_name'])){ 
      $upfile=$_FILES["upfile"]; 
      //获取数组里面的值 
      $name=$upfile["name"];//上传文件的文件名 
      $type=$upfile["type"];//上传文件的类型 
      $size=$upfile["size"];//上传文件的大小 
      $tmp_name=$upfile["tmp_name"];//上传文件的临时存放路径 
      //判断是否为图片 
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
      /** 
      * 0:文件上传成功<br/> 
      * 1：超过了文件大小，在php.ini文件中设置<br/> 
      * 2：超过了文件的大小MAX_FILE_SIZE选项指定的值<br/> 
      * 3：文件只有部分被上传<br/> 
      * 4：没有文件被上传<br/> 
      * 5：上传文件大小为0 
      */ 
      $error=$upfile["error"];//上传后系统返回的值 
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
