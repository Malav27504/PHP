<!DOCTYPE html>
<html lang="en">
<head>

  <title>UserData</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>User Details</h1>
  </header>

  <main>
  <fieldset>
  <div class="container">

<?php


$servername="localhost";
$username="root";
$password="admin";
$database="phpassignment1";


$conn = new mysqli($servername, $username, $password, $database);

if (!$conn)
    {
        die("Connection Error : ".mysqli_connect_error());
    }
    $sql = "SELECT * FROM userdata";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<p class='white'> ID : ".$row['id']. " </p>";
        echo "<p class='white'> First Name : ".$row['fname']. " </p>";
        echo "<p class='white'> Last Name : ".$row['lname']. " </p>";
        echo "<p class='white'> Email : ".$row['email']. " </p>";
        echo "<p class='white'> Mobile No : ".$row['mobile_no']. " </p> <br>";
    
    }
?> 

        
