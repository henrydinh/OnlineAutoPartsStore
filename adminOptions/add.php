<?php
$link = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');

if (!$link)
{
    die("Not Connecting to Database");
    exit();
}


$name=$price=$available=$category=$description=$tags="";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = clean_input($_POST["item_name"]);
    if ($name == null || $name =="")
    {
        header('Location: onlineautopartsstore/index.html');
        exit();
    }

    $price = clean_input($_POST["item_price"]);
    if ($price == null || $price =="")
    {
        header('Location: onlineautopartsstore/index.html');
        exit();
    }
    $available = clean_input($_POST["item_available"]);
    if ($available == null || $available =="")
    {
        header('Location: onlineautopartsstore/index.html');
        exit();
    }

    $category = clean_input($_POST["item_category"]);
    if ($category == null || $category =="")
    {
        header('Location: onlineautopartsstore/index.html');
        exit();
    }

    $description = clean_input($_POST["item_description"]);
    if ($description == null || $description =="")
    {
        header('Location: onlineautopartsstore/index.html');
        exit();
    }

    $tags = clean_input($_POST["item_tags"]);
    if ($tags == null || $tags =="")
    {
        header('Location: onlineautopartsstore/index.html');
        exit();
    }



}


$insertItemQuery = "INSERT INTO `onlineautopartsstore`.`item` (`item_ID`, `item_name`, `price`, `num_available`, `category`, `description`, `tags`) VALUES 
                    (NULL, '$name', $price, '$available', '$category', '$description', '$tags') ";





if ($stmt = mysqli_query($link, $insertItemQuery))
{
    mysqli_stmt_close($stmt);

}

/*TODO Add functionality where upon add it confirms add on screen*/

header('Location: /onlineautopartsstore/my-account.html#success=success');










function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}