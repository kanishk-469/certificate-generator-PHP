<?php
$msg=$_GET['msg_email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  
  <title>Certificate Generator</title>
  <link rel="stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
 <style>
     /* Importing fonts from Google */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    /*background: linear-gradient(45deg, #ce1e53, #8f00c7);*/
    background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%),
            linear-gradient(127deg, rgba(0,255,0,.8), rgba(0,255,0,0) 70.71%),
            linear-gradient(336deg, rgba(0,0,255,.8), rgba(0,0,255,0) 70.71%);
    min-height: 100vh;
}

body::-webkit-scrollbar {
    display: none;
}

.wrapper {
    max-width: 800px;
    margin: 80px auto;
    padding: 30px 45px;
    box-shadow: 5px 25px 35px #3535356b;
}

.wrapper label {
    display: block;
    padding-bottom: 0.2rem;
}

.wrapper .form .row {
    padding: 0.6rem 0;
}

.wrapper .form .row .form-control {
    box-shadow: none;
}

.wrapper .form .option {
    position: relative;
    padding-left: 20px;
    cursor: pointer;
}

.wrapper .form .option input {
    opacity: 0;
}

.wrapper .form .checkmark {
    position: absolute;
    top: 1px;
    left: 0;
    height: 20px;
    width: 20px;
    border: 1px solid #bbb;
    border-radius: 50%;
}

.wrapper .form .option input:checked~.checkmark:after {
    display: block;
}

.wrapper .form .option:hover .checkmark {
    background: #f3f3f3;
}

.wrapper .form .option .checkmark:after {
    content: "";
    width: 10px;
    height: 10px;
    display: block;
    background: linear-gradient(45deg, #ce1e53, #8f00c7);
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s;
}

.wrapper .form .option input[type="radio"]:checked~.checkmark {
    background: #fff;
    transition: 300ms ease-in-out 0s;
}

.wrapper .form .option input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1);
}

#sub {
    display: block;
    width: 100%;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    color: #333;
}

#sub:focus {
    outline: none;
}

@media(max-width: 768.5px) {
    .wrapper {
        margin: 30px;
    }

    .wrapper .form .row {
        padding: 0;
    }
}

@media(max-width: 400px) {
    .wrapper {
        padding: 25px;
        margin: 20px;
    }
}
     
 </style> 
  
</head>
<body>
<div class="wrapper" style="color:white;text-align:center;border-radius:20px;margin-bottom:-15px;"><h3><em>Certificate Generator</em> </h3></div>
<div class="wrapper rounded bg-white">
<div class="h3">Fill Participant Details To Create Certificate</div><font style="color:green;"><i><?php echo $msg;?></i></font>
 <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="form">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <label>Participant Name</label>
                    <input type="text" class="form-control" name="name" placeholder= "enter name" required>
                </div>
                <div class="col-md-6 mt-md-0 mt-3">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" required>
                </div>
                <!--<div class="col-md-6 mt-md-0 mt-3">-->
                <!--    <label>Last Name</label>-->
                <!--    <input type="text" class="form-control" required>-->
                <!--</div>-->
            </div>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <label>Rank</label>
                    <input type="number" class="form-control" name="rank"  placeholder="1 to 10" required>
                </div>
                <div class="col-md-6 mt-md-0 mt-3">
                    <label>Code</label>
                    <input type="tel" class="form-control" name="code" pattern="[0-9]{4}"  placeholder= "2233" required>
                </div>
            </div>
            <div class=" my-md-2 my-3">
                <label>Participant Email</label>
                    <input type="email" class="form-control" name="email" placeholder= "enter email" required>
            </div>
            <div class=" my-md-2 my-3">
                <label>Event Name</label>
                <select id="sub"  name="eventname" required>
                    <option value="" selected hidden>choose event name</option>
                    <option value="dancing">Dancing</option>
                    <option value="singing">Singing</option>
                    <option value="coding">Coding</option>
                    <option value="poetry">Poetry</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary mt-3" name="subbtn">
        </div>
      </form>
       <a href="participant_dash.php" class="btn btn-primary mt-2">Dashboard</a>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
</body>
</html>