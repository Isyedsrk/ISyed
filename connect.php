<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['msg'];

//Database Connectivity
$conn = new mysqli('localhost','root','','portfolio');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);

}
else{
    $stmt = $conn->prepare("insert into contact(name, email, phone, msg)values(?,?,?,?)");
    $stmt->bind_param("ssis",$name,$email,$phone,$msg);
    $stmt->execute();
    echo"Message sent Succesfully!";
    $stmt->close();
    $conn->close();
}

?>