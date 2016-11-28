<?php
$link = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');

if (!$link)
{
    die("Not Connecting to Database");
    exit();
}
$userID=$item_ID=$quantity="value";

if(!empty($_POST['item_id'])){
    $item_ID = $_POST['item_id'];
}else{
    echo "Failed to Add to Cart";
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $quantity = clean_input($_POST["quantity"]);
    if ($quantity == null || $quantity =="")
    {
        echo "Invalid Input Please Try Again";
        exit();
    }

    $userID = clean_input($_POST['user_id_number']);



}




$insertItemQuery = "INSERT INTO cart VALUES ($userID, $item_ID, $quantity)";






if ($stmt = mysqli_query($link, $insertItemQuery))
{
    echo "Successfully Added";
    mysqli_stmt_close($stmt);

}

else
{
    echo "You already have this item in your cart";
}





function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}