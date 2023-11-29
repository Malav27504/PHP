<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Student View</title>
    <style>
        body{
            background-color: #F5F5DC;
            /* margin-bottom: 20px; */
        }
        .img-fluid{
            max-width: 200px;
            height: 150px;
        }
        .footer{
            height:70px;
            padding-top:20px;
            /* margin-top: 20px; */
            padding-bottom: 20px;   
            display: inline-block;
            /* margin-top: 20%; */
        }
        
    </style>
</head>
<body>

<header>
            <!-- <h1>
            Subscriber Form
            </h1> -->
            <nav class="nav">
                <ul>
                   <li><a class="active" href="index.php">Home</a></li>
                   <li><a  href="student-edit.php">Edit</a></li>
                   <li><a  href="student-view.php">View</a></li>
                   <li><a  href="#about">About</a></li>
                    
                </ul>
                </nav>
        </header>
        
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Student Name</label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Email</label>
                                        <p class="form-control">
                                            <?=$student['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Phone</label>
                                        <p class="form-control">
                                            <?=$student['phone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Course</label>
                                        <p class="form-control">
                                            <?=$student['course'];?>
                                        </p>
                                    </div>
                                    <!-- Display the image -->
                                    <div class="mb-3">
                                        <label>Student Image</label>
                                        <?php
                                            $imagePath = "images/" . $student['image']; // Adjust the path based on your file structure
                                            echo "<img src='$imagePath' alt='Student Image' class='img-fluid'>";
                                        ?>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Created by Malav Panchal</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
