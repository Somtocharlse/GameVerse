<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>GameVerse Cart</title>

<link rel="stylesheet" href="css/style.css">

</head>


<body>


<header class="navbar">

    <div class="logo">
        GameVerse
    </div>


    <nav>

        <a href="index.php">Home</a>

        <a href="cart.php">
            Cart 🛒
        </a>

        <a href="logout.php">
            Logout
        </a>

    </nav>

</header>



<section class="cart-container">


<h1>
Your Shopping Cart
</h1>



<?php


if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) 
{

?>

<div class="empty-cart">

    <h2>
        Your cart is empty
    </h2>


    <p>
        Browse our games and add them to your cart.
    </p>


    <a href="index.php" class="btn">
        Continue Shopping
    </a>


</div>


<?php

}

else
{


foreach($_SESSION['cart'] as $game_id)
{


$stmt = $conn->prepare("SELECT * FROM games WHERE id = ?");

$stmt->bind_param("i", $game_id);

$stmt->execute();

$result = $stmt->get_result();



if($result->num_rows > 0)
{


$game = $result->fetch_assoc();


?>


<div class="cart-card">


<img src="images/<?php echo $game['image']; ?>" 
alt="<?php echo $game['title']; ?>">



<div class="cart-info">


<h2>
<?php echo $game['title']; ?>
</h2>



<p>
Price: $<?php echo $game['price']; ?>
</p>



<a href="remove_from_cart.php?id=<?php echo $game['id']; ?>" 
class="remove-btn">

Remove

</a>



</div>


</div>



<?php

}


}


}


?>


</section>


</body>

</html>