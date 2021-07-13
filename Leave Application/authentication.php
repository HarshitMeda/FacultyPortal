<?php    
session_start();  
    $con = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");
    $username = $_POST['user'];  
    $password = $_POST['pass'];
    //echo $username \n;
    //echo $password \n;  
      
        //to prevent from mysqli injection  
        if(isset($_POST['submit'])&&!empty($_POST['submit']))
        {
    
            $hashpassword = md5($_POST['pass']);
            $sql ="select * from login_info where username = '".pg_escape_string($_POST['user'])."' and password ='".$password."'";
            $data = pg_query($con,$sql); 
            $login_check = pg_num_rows($data);
            if($login_check > 0){ 
                
                echo "Login Successfully"; 
                
                
                $_SESSION["user_id"] = $username;
                $_SESSION["psw"] = $password;
                 $_SESSION["bool_logged_in"] = 5;
                 header("Location: faculty_portal.php");

            }
            else 
            {
                
                echo "Invalid Details\n";
                echo "hi \n";
            }
        }
        else
        {
            echo "Error\n";
        }
        
?>  
