<?php
/*<div class="product-image-wrapper">
<div class="single-products">
<div class="productinfo text-center">*/


$con = mysqli_connect('localhost', 'root', 'root', 'onlineautopartsstore');
if(!$con)
{
    die('Could not connect: '.mysqli_error($con));
}

$sql = "SELECT * FROM item;";

$items = $con->query($sql);



?>

    <table class="table-bordered table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Number Available</th>
                <th>Category</th>
                <th>Page Link</th>
            </tr>
        </thead>
        <tbody>

<?php
while ($allItems = $items->fetch_object())
{ ?>
        <tr>
            <td>
                <?php echo "$allItems->item_ID"; ?>
            </td>

            <td>
                <?php echo "$allItems->item_name"; ?>
            </td>

            <td>
                <?php echo "$allItems->price"; ?>
            </td>

            <td>
                <?php echo "$allItems->num_available"; ?>
            </td>

            <td>
                <?php echo "$allItems->category"; ?>
            </td>

            <td>
                <a href="/onlineautopartsstore/product-details.html?item_ID=<?php echo $allItems->item_ID ?>">Page</a>
            </td>


        </tr>



<?php } ?>

        </tbody>
    </table>