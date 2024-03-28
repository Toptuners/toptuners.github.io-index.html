<?php
$conn = mysqli_connect('localhost', 'id21808828_toptunersautomotive', 'P@ssword1122#');

mysqli_select_db($conn,'id21808828_toptunersautomotive');

$sql = "INSERT INTO user_info ('name','email','subject','message' ) VALUES ('$_POST[name]', '$_POST[email]', '$_POST[subject]', '$_POST[message]')";
$URL="https://top-tuners-automotive.000webhostapp.com/login/";

    if ($conn->query($sql) == TRUE) {
    echo "User Registered Successfully.";
	// code for redirect using the variable declared on line 10
    echo "<script type='text/javascript'>setTimeout(function() {window.location.href = '{$URL="https://top-tuners-automotive.000webhostapp.com/contact/"}';}, 3000);</script>";
     
    }else {
   
    echo $conn->error;
    
    echo "<script type='text/javascript'>setTimeout(function() {window.location.href = '{$URL="https://top-tuners-automotive.000webhostapp.com/contact/"}';}, 3000);</script>";
    }
    $conn->close();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CONTACT</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    <form action="contact.php" method="post">
    <h2>CONTACT</h2>
    <<?php if(isset($_GET["error"])) {?>
    <p class="error"> <?php echo $_GET['error']; ?></p>
    <?php} ?>
    <label>Your Name</label>
    <input type="text" name="name" placeholder="Your Name"><br>
    <label>Your Email</label>
    <input type="email" name="email" placeholder="Your Email"><br>
    <label>Subject</label>
    <input type="subject" name="subject" placeholder="Subject"><br>
    <label>Message</label>
    <input type="message" name="message" placeholder="Leave a message here"><br>

    <button type="submit">Send Message</button>
    </form>
</body>
</html>

