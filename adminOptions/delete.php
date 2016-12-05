<?php

$link = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');

if (!$link)
{
    die("Not Connecting to Database");
    exit();
}


$itemID="";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $itemID = clean_input($_POST["item_id"]);
}


$deleteItemQuery = "UPDATE item SET num_available = 0 WHERE item_ID = $itemID";

$idReset1 = "SELECT MAX( `item_ID` ) FROM `item` ;";




if ($stmt = mysqli_query($link, $deleteItemQuery))
{

   echo "Item Successfully Deleted";

    mysqli_stmt_close($stmt);

}












function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




?>