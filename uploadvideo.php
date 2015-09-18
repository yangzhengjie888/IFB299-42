

<?php

  include "conn.php";

  $sql = "select * from media";


  $result=mysql_query($sql);

  if(!$result){

      echo "<script>alert('No videos are found');</script>"

  }

  if(mysql_num_rows($result)==0){


      echo "<script>window.alert('No video files are found.');</script>"


  }


    while($row==mysql_fetch_assoc($ressult)){

          $fileaddress=$row["media_address"];
          $file=pathinfo($fileaddress);

          $filetype=$file['extension'];

          if( $filetype=='mp4'){
            
            $filesrc=$file['dirname'];

            echo "<video width="300" height="220" controls>
            <source src="$filesrc" type="video/mp4">".$row["medianame"]."</video>";
            

          }
       

    }



      mysql_close();

?>
