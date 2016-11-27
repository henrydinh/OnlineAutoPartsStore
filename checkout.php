<?php


include 'check-logged-in.php';


$link = new mysqli('localhost', 'root', 'root', 'onlineautopartsstore');


if ($link->connect_errno)
{
    die("Not Connecting to Database");
    exit();
}

$ID = $_SESSION['user_ID'];

$price=$address=$city=$state=$fname=$lname="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fname = clean_input($_POST["fname"]);
    if ($fname == null || $fname =="")
    {
        echo "Invalid Input Please Try Again";
        exit();
    }
    $lname = clean_input($_POST["lname"]);
    if ($lname == null || $lname =="")
    {
        echo "Invalid Input Please Try Again";
        exit();
    }
    $address = clean_input($_POST["address"]);
    if ($address == null || $address =="")
    {
        echo "Invalid Input Please Try Again";
        exit();
    }
    $city = clean_input($_POST["city"]);
    if ($city == null || $city =="")
    {
        echo "Invalid Input Please Try Again";
        exit();
    }
    $state = clean_input($_POST["state"]);
    if ($state == null || $state =="")
    {
        echo "Invalid Input Please Try Again";
        exit();
    }

    $price = clean_input($_POST["total"]);



}




$sql= "INSERT INTO `onlineautopartsstore`.`transaction` (`date`, 
                    `total_price`, `address`, `city`, `state`) VALUES ('test date', '$price', '$address', '$city', '$state');";

if ($stmt = $link->query($sql))
{
    echo "Checkout Complete";


}



//Get the transaction_id generated for this transaction
$getTransactionID = "SELECT transaction_ID FROM `transaction` WHERE date = 
                    'test date' AND total_price = $price AND address = '$address' AND city ='$city' AND state ='$state'";



$temp2 = $link->query($getTransactionID);


$transactionIDObject = $temp2->fetch_object();

//Contains transaction_id for this transaction
$transactionID = $transactionIDObject->transaction_ID;



$updateTransactionItems = "SELECT * FROM `cart` WHERE user_ID = $user_ID";

//Object containing all the items that this user currently had in their cart
//We will put these items in the transations_items table for storage and then remove them from the cart.
$items = $link->query($updateTransactionItems);

while ($allItems = $items->fetch_object())
{
    /*$allItems->item_ID;*/

    $itemToInsert = $allItems->item_ID;
    $itemToInsertQuantity = $allItems->quantity;

    $transaction_items_SQL = "INSERT INTO transaction_items VALUES ($transactionID, $itemToInsert, $itemToInsertQuantity)";


    $link->query($transaction_items_SQL);



}

$user_transactions_sql = "INSERT INTO user_transactions VALUES ($user_ID, $transactionID) ";
$link->query($user_transactions_sql);


$deleteFromCartSQL = "DELETE FROM cart WHERE user_ID = '$user_ID' ";
$link->query($deleteFromCartSQL);
$link->close();





function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>