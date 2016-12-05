<?php

$link = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');

if (!$link)
{
    die("Not Connecting to Database");
    exit();
}

$itemID = $_POST["item_id"];
echo $itemID;



$itemID = $_POST["item_id"];

$sql = "UPDATE item SET num_available = 0 WHERE item_ID = $itemID";

if ($stmt = mysqli_query($link, $sql))
{

    mysqli_stmt_close($stmt);

    header('Location: /onlineautopartsstore/my-account.html');

}


