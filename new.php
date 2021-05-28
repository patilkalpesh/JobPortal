<?php
echo "hello";
$servername="localhost";
$username="root";
$password="";
$dbname="jobportal";
$con=new mysqli($servername,$username,$password,$dbname);

$login=$_POST["login"];
$insert=$_POST["insert"];

if($insert==TRUE)
{
    echo "In Insert";
    $name= $_POST["name"];
    $contact= $_POST["contact"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    if($con->connect_error)
    {
    echo "Connection Error <br>";
    }
    else
    {
    echo "Connection establish <br>"; }
    if($insert==TRUE)
    {
    $sqlinsert="insert into users values('$name','$contact','$email','$password')";
    if($con->query($sqlinsert)==TRUE)
    {
    echo "Record inserted successfully<br>";
    }
    else
    echo "Record insertion failed<br>.$con->error";
    }
    // if($delete==TRUE)
    // {
    // $sqldelete="delete from users where fname='$fname'";
    // if($con->query($sqldelete)==TRUE)
    // {
    // echo "Record deleted successfully<br>";
    // }
    // else
    // echo "Record deletion failed<br>.$con->error";
    // }
    // if($update==TRUE)
    // {
    // $sqlupdate="update users set lname='$lname' where fname='$fname'";
    // if($con->query($sqlupdate)==TRUE)
    // {
    // echo "Record updated successfully";
    // }
    // else
    // echo "Record updation failed".$con->error;
    // }
    // if($select==TRUE)
    // {
    // $sqlselect="select fname,lname from form1 ";
    // $result = $con->query($sqlselect);
    // if($result->num_rows>0)
    // {
    // while($row = $result->fetch_assoc())
    // {
    //  echo "First Name : " . $row["fname"]. " Last Name: " .
    // $row["lname"]. "<br>";
    //  }
    // }
    else
    {
     echo "0 results";
    }
}
    
if($login==TRUE)
{
    $email= $_POST["email"];
    $password= $_POST["password"];

    echo "enterer";
    if(isset($email, $password)) 
    {     
        echo "double";

        $result1 = mysqli_query($con,"SELECT email, password FROM users WHERE email = '".$email."' AND  password = '".$password."'");

        if(mysqli_num_rows($result1) > 0 )
        { 
            $_SESSION["logged_in"] = true; 
            $_SESSION["naame"] = $name; 
            echo 'tonada';
        }
        else
        {
            echo 'The username or password are incorrect!';
        }
}
}

// $delete=$_POST["delete"];
// $select=$_POST["select"];
// $update=$_POST["update"];

// }
?>