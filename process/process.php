<?php   
    include("connect.php");
    
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $pass = md5($_POST["password"]);
        $query = "select * from user where username = '$username' and password = '$pass'";
        $result = $con->query($query);
        if($result)
        {
            if($rowcount=$result->num_rows)
            {
                echo "success";
            }
            else
            {
                echo "failed";
            } 
        }
        else
        {
            echo  $con -> error;
        }
    }
    if (isset($_POST["signup"])) {
        $username = $_POST["username"];
        $pass = md5($_POST["password"]);
        $query = "insert into user values(null,'$username','$pass')";
        $result = $con->query($query);
        if($result)
        {
            echo "success";
        }
        else
        {
            echo  $con -> error;
        }
    }
?>