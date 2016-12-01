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

$sql = "DELETE FROM item where item_ID = $itemID";
echo "Test $itemID";

if ($stmt = mysqli_query($link, $sql))
{

    mysqli_stmt_close($stmt);

    header('Location: /onlineautopartsstore/my-account.html');

}


