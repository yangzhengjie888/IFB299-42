<?php
	$output='';
  
  $output.= "<form enctype='multipart/form-data' method='post' action='upload1.php' name='upform' >
  upload files:
  <input name='upfile' type='file' size='80' />
    <input name='id' type='hidden' value='$row[id]' />
  <input type='submit' value='upload'><br>
  These kinds of files were supported:
</form>"
?>


<html>
<body>
  
	  <?php include "home.html";

?>
</body>
</html>

