<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    // File upload handling
    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow only certain file types
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $allowed_extensions)) {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Update student details along with the image filename in the database
            $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course', image='$image' WHERE id='$student_id' ";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                $_SESSION['message'] = "Student Updated Successfully";
                header("Location: index.php");
                exit(0);
            } else {
                $_SESSION['message'] = "Student Not Updated";
                header("Location: index.php");
                exit(0);
            }
        } else {
            $_SESSION['message'] = "Failed to upload image";
            header("Location: index.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed.";
        header("Location: index.php");
        exit(0);
    }
}

// ... (The rest of your existing code)





if (isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    // File upload handling
    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow only certain file types
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $allowed_extensions)) {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Insert student details along with the image filename into the database
            $query = "INSERT INTO students (name, email, phone, course, image) VALUES ('$name','$email','$phone','$course','$image')";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                $_SESSION['message'] = "Student Created Successfully";
                header("Location: student-create.php");
                exit(0);
            } else {
                $_SESSION['message'] = "Student Not Created";
                header("Location: student-create.php");
                exit(0);
            }
        } else {
            $_SESSION['message'] = "Failed to upload image";
            header("Location: student-create.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed.";
        header("Location: student-create.php");
        exit(0);
    }
}


?>
