<?php 

$servername ="localhost";
$username ="participant";
$password ="";
$dbname ="participant";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die('connection Failed :' .$conn->connect_error);
}else{
    echo "successful";

}


function text_input($data){
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    
    return $data;
}


if(isset($_POST['subbtn'])){
    
$name=text_input($_POST['name']);
$dob=text_input($_POST['dob']);
$gender=text_input($_POST['gender']);
$email=text_input($_POST['email']);
$contact=text_input($_POST['contact']);
$event_option=text_input($_POST['event_option']);

// echo $gender .$dob;

$sqlInsert = "INSERT INTO participant (name, gender, contact, email, dob, eventname ) VALUES ('$name', '$gender', '$contact', '$email', '$dob', '$event_option')";
$result = $conn->query($sqlInsert);

if($result){
    header("Location: participant_form.php?msg=Form Successfully Submitted");
}else{
     header("Location: participant_form.php?msg=Form Submittion Failed");
}

$conn->close();


}


?>