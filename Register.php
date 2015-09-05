<?php  
    if(isset($_POST["Submit"]) && $_POST["Submit"] == "Register")  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        $psw_confirm = $_POST["confirm"];  
        if($user == "" || $psw == "" || $psw_confirm == "")  
        {  
            echo "<script>alert('Please make sure all information is correct'); history.go(-1);</script>";  
        }  
        else  
        {  
            if($psw == $psw_confirm)  
            {  
                mysql_connect("localhost","root","sixx");   //
                mysql_select_db("vt");  //
                mysql_query("set names 'gdk'"); //  
                $sql = "select username from user where username = '$_POST[username]'"; //  
                $result = mysql_query($sql);    //
                $num = mysql_num_rows($result); //
                if($num)    //
                {  
                    echo "<script>alert('The username has exist already'); history.go(-1);</script>";  
                }  
                else    //
                {  
                    $sql_insert = "insert into user (username,password,phone,address) values('$_POST[username]','$_POST[password]','','')";  
                    $res_insert = mysql_query($sql_insert);  
                    //$num_insert = mysql_num_rows($res_insert);  
                    if($res_insert)  
                    {  
                        echo "<script>alert('Register Successful'); history.go(-1);</script>";  
                    }  
                    else  
                    {  
                        echo "<script>alert('System is busy. Please wait'); history.go(-1);</script>";  
                    }  
                }  
            }  
            else  
            {  
                echo "<script>alert('Password and Confirmed password are not identical'); history.go(-1);</script>";  
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('Submission fail'); history.go(-1);</script>";  
    }  
?>  
