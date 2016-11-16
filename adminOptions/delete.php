<?php

$link = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');

if (!$link)
{
    die("Not Connecting to Database");
    exit();
}


$name=$price=$available=$category=$description=$tags=$itemID="";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $itemID = clean_input($_POST["item_id"]);

    $name = clean_input($_POST["item_name"]);


    $price = clean_input($_POST["item_price"]);

    $available = clean_input($_POST["item_available"]);


    $category = clean_input($_POST["item_category"]);


    $description = clean_input($_POST["item_description"]);

    $tags = clean_input($_POST["item_tags"]);




}


$deleteItemQuery = "DELETE FROM item where item_id like '%$itemID' AND item_name like '%$name'
                    AND price like '%$price' AND category like '%$category';";

$idReset1 = "SELECT MAX( `item_ID` ) FROM `item` ;";




if ($stmt = mysqli_query($link, $deleteItemQuery))
{

   echo "Item Successfully Deleted";

    mysqli_stmt_close($stmt);

}

/*TODO Add functionality where upon delete it will say something like "delete confirmed"*/











function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




?>