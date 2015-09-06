<html>
    <body>
      <?php  
    if(isset($_POST["submit"]) && $_POST["submit"] == "Login")  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('Please enter User ID and Password'); history.go(-1);</script>";  
        }  
        else  
        {  
            mysql_connect("localhost","root","sixx");  
            mysql_select_db("vt");  
            mysql_query("set names 'gbk'");  
            $sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";  
            $result = mysql_query($sql);  
            $num = mysql_num_rows($result);  
            if($num)  
            {  
                $row = mysql_fetch_array($result);   
                echo $row[0];  
            }  
            else  
            {  
                echo "<script>alert('Incorrect user ID or password!');history.go(-1);</script>";  
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('Submittion fail！'); history.go(-1);</script>";  
    }  
  
?>  
  
    </body>
</html>
