<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($dbconn, $_POST['delete_user']);

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($dbconn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}


if(isset($_POST['update_user']))
{
    $user_id = mysqli_real_escape_string($dbconn, $_POST['user_id']);
    $name = mysqli_real_escape_string($dbconn, $_POST['name']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $phone = mysqli_real_escape_string($dbconn, $_POST['phone']);
    $city = mysqli_real_escape_string($dbconn, $_POST['city']);

    $query = "UPDATE users SET name='$name', email='$email', phone='$phone', city='$city' WHERE id='$user_id'";
    $query_run = mysqli_query($dbconn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "User Not Updated";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_user']))
{
    $name = mysqli_real_escape_string($dbconn, $_POST['name']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $phone = mysqli_real_escape_string($dbconn, $_POST['phone']);
    $city = mysqli_real_escape_string($dbconn, $_POST['city']);

    $query = "INSERT INTO users (name,email,phone,city) VALUES 
    ('$name','$email','$phone','$city')";

    $query_run = mysqli_query($dbconn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "User Created Successfully";
        header("Location: user-create.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "User Not Created";
        header("Location: user-create.php");
        exit(0);
    }
}
?>