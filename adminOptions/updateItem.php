<?php
$link = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');

if (!$link)
{
    die("Not Connecting to Database");
    exit();
}


$name=$price=$available=$category=$description=$tags=$id="";



if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = clean_input($_POST["item_id"]);

    $name = clean_input($_POST["item_name"]);
    if ($name != null || $name !="")
    {
        $itemNameQuery = "UPDATE `onlineautopartsstore`.`item` SET `item_name` = '$name' WHERE `item`.`item_ID` = $id;";

        if ($stmt = mysqli_query($link, $itemNameQuery))
        {
            mysqli_stmt_close($stmt);

        }
    }

    $price = clean_input($_POST["item_price"]);
    if ($price != null && $price !="")
    {
        $itemPriceQuery = "UPDATE `onlineautopartsstore`.`item` SET `price` = '$price' WHERE `item`.`item_ID` = $id;";

        if ($stmt = mysqli_query($link, $itemPriceQuery))
        {
            mysqli_stmt_close($stmt);

        }
    }
    $available = clean_input($_POST["item_available"]);
    if ($available != null && $available !="")
    {
        $itemAvailableQuery = "UPDATE `onlineautopartsstore`.`item` SET `num_available` = '$available' WHERE `item`.`item_ID` = $id;";

        if ($stmt = mysqli_query($link, $itemAvailableQuery))
        {
            mysqli_stmt_close($stmt);

        }

    }

    $category = clean_input($_POST["item_category"]);
    if ($category != null && $category !="")
    {
        $itemCategoryQuery = "UPDATE `onlineautopartsstore`.`item` SET `category` = '$category' WHERE `item`.`item_ID` = $id;";

        if ($stmt = mysqli_query($link, $itemCategoryQuery))
        {
            mysqli_stmt_close($stmt);

        }
    }

    $description = clean_input($_POST["item_description"]);
    if ($description != null && $description !="")
    {
        $itemDescriptionQuery = "UPDATE `onlineautopartsstore`.`item` SET `description` = '$description' WHERE `item`.`item_ID` = $id;";

        if ($stmt = mysqli_query($link, $itemDescriptionQuery))
        {
            mysqli_stmt_close($stmt);

        }
    }

    $tags = clean_input($_POST["item_tags"]);
    if ($tags != null && $tags !="")
    {
        $itemTagsQuery = "UPDATE `onlineautopartsstore`.`item` SET `tags` = '$tags' WHERE `item`.`item_ID` = $id;";

        if ($stmt = mysqli_query($link, $itemTagsQuery))
        {
            mysqli_stmt_close($stmt);

        }
    }


}

    echo "Item $id Successfully Updated";





function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


