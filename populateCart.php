<?php
$link = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');

if (!$link)
{
    die("Not Connecting to Database");
    exit();
}


$getCart = "SELECT * FROM item inner JOIN cart ON item.item_ID=cart.item_ID";

$totalPrice="";



$_SESSION["query_result"] = $link->query($getCart);



    while ($_SESSION["rows"] = ($_SESSION["query_result"]->fetch_object()))
    {

        $itemID = $_SESSION["rows"]->item_ID;




        if ($user_ID == $_SESSION["rows"]->user_ID)
        {

            ?>


            <tr>
                <td class="cart_product">
                    <img src=<?php ;
                    echo '"images/product-details/similar' . $_SESSION["rows"]->item_ID . '-1.jpg"' ?> alt="<?php $_SESSION["rows"]->item_name ?>"/>
                </td>
                <td class="cart_description">
                    <h4><a href="">
                            <?php $temp = $_SESSION["rows"]->item_name;
                            echo "$temp"; ?>
                        </a></h4>
                </td>
                <td class="cart_price">
                    <h2><?php $price = $_SESSION["rows"]->price;
                        $totalPrice = $totalPrice + $price * $_SESSION["rows"]->quantity;
                        echo "$$price"; ?></h2>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <span><?php echo  $_SESSION["rows"]->quantity ?></span>
                    </div>
                </td>

                <td class="cart_delete">
                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                </td>
            </tr>


            <?php


        }



    } ?>
