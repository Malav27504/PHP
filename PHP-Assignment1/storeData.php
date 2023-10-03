<!DOCTYPE html>
<html lang="en">
<head>

  <title>Thank you</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Thank you for subscribing</h1>
  </header>

  <main>
  <fieldset>
  <div class="container">


    <?php

	  $fname = $_POST['fname'];
	  $lname = $_POST['lname'];
    $Email = $_POST['email'];
    $Number = $_POST['Number'];

    echo "<p class='white'> First Name: $fname </p>";
    echo "<p class='white'> Last Name: $lname </p>";
    echo "<p class='white'> Email address : $Email </p>";
    echo "<p class='white'> Phone Number : $Number </p>";

    $hostname = "localhost";
    $username="root";
    // $password=" ";
    $database="phpassignment1";

    $conn=mysqli_connect($hostname,$username,NULL,$database);

    if(!$conn)
    {
        die("Connection Error:".mysqli_connect_error());
    }
    else
    {
        
        $sql="INSERT INTO `userdata` (`id`, `fname`, `lname`, `email`,`mobile_no`) VALUES (NULL,'$fname', '$lname', '$Email', '$Number')";
        $result=mysqli_query($conn,$sql);

        if($result)
        {
            echo "Data inserted successfully";

        }
        else{
            echo "Something Went Wrong...".mysqli_error($conn);
        }
    }
  ?>
 </div>
</fieldset>
  </main>

  <div class="footer">
        <p>Created by Malav Panchal</p>
    </div>

</body>
</html>


