<?php
$insert = false;
if(isset($_POST['name'])){
  
$server = "localhost";
$username ="root";
$password ="";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to" .
    mysqli_connect_error());
}
// echo "success connecting to the db";

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

  $sql ="INSERT INTO `sintu`.`sintu`(`Name`, `Age`, `Gender`, `Email`, `Phone`, `other`, `Dt`) VALUES ( 
  '$name', '$age', '$gender', '$email', '$phone', '$desc', 
  current_timestamp());";
  
//   echo $sql;

  if($con->query($sql)==true){
    //   echo "successfully inserted";
    $insert = true;

  }
  else{
      echo "ERROR: $sql <br> $con->error";

  }
  $con->close();
}
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel From</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="maxresdefault"src="maxresdefault.jpg" alt="iota infotech">
    <div class="container">
        <h1>WELCOME TO iOTA INFOTECH SHILMA TRIP FORM</h1>
        <p>Enter your details to confirm your participation in the trip</p>
    <?php
    if($insert == true){
       echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for 
       the US trip</p>";
       
    }
    ?>
        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="text" name="email" id="email" placeholder="Enter your email">
        <input type="text" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="desc" id="" cols="30" rows="10"
            placeholder="Enter any other infor here"></textarea>
            <button class="btn">submit</button>
           
        </form>
    </div>
    <script src="index.js"></script>

    
</body>
</html>