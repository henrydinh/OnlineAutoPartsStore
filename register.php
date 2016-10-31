<?php

session_start();

$db_user="root";
$db_password="root";
$db_name="onlineautopartsstore";
$db_host="localhost";

$link = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');


if (!$link)
{
    die("Not Connecting to Database");
    exit();
}

$firstName=$lastName=$emailAddress=$password="";





if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $firstName = clean_input($_POST["firstName"]);
    if ($firstName == null || $firstName =="")
    {
        header("Location: login.html");
        exit();
    }


    $lastName = clean_input($_POST["lastName"]);
    if ($lastName == null || $lastName =="")
    {
        header("Location: login.html");
        exit();
    }

    $emailAddress = clean_input($_POST["email"]);
    if ($emailAddress == null || $emailAddress =="")
    {
        header("Location: login.html");
        exit();
    }


    $password = clean_input($_POST["password"]);
    if ($password == null || $password=="" || strlen($password) < 8)
    {
        header("Location: login.html");
        exit();
    }

}

$insertQuery = ("INSERT INTO user (first_name, last_name, email, hashed_password, is_admin) VALUES ('$firstName','$lastName', '$emailAddress', '$password', 0)");


if ($stmt = mysqli_query($link, $insertQuery))
{
    mysqli_stmt_close($stmt);

}




header("Location: index.html");


function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

