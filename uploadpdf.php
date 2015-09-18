

<?php

  include "conn.php";

  $sql = "select * from media";


  $result=mysql_query($sql);

  if(!$result){

      echo "<script>alert('No pdf are found');</script>"

  }

  if(mysql_num_rows($result)==0){


      echo "<script>window.alert('No pdf files are found.');</script>"


  }


    while($row==mysql_fetch_assoc($result)){

          $fileaddress=$row["media_address"];
          $file=pathinfo($fileaddress);
          $filetype=$file['extension'];

          if( $filetype=='pdf'){
            
            $filesrc = $file['dirname'];


            echo "<a href="$filesrc" target="blank"><img src="/img/pdf.png">".$row["medianame"]."</a>";
            

          }
       

    }
      
      
    
      mysql_close();
    
?>
