<?php
$servername ='localhost';
$username = 'participant';
$password = '';
$dbname = 'db_name_participant';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die('Connection Failed:' .$conn->connect_error);
}else{
    
$id=$_GET['id'];

$sqlDelete = "DELETE FROM participant WHERE id='$id'";
$result = $conn->query($sqlDelete);
header("Location: participant_dash.php");

}

?>