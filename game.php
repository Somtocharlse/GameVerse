<?php
require_once 'config.php';
include 'includes/header.php';

// Check if game ID exists
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM games WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<h2 style='text-align:center;margin-top:150px;'>Game not found.</h2>";
    include 'includes/footer.php';
    exit();
}

$game = $result->fetch_assoc();
?>

<section class="game-details">

    <div class="game-container">

        <!-- Left Side -->
        <div class="game-left">

            <img
                src="images/<?php echo htmlspecialchars($game['image']); ?>"
                alt="<?php echo htmlspecialchars($game['title']); ?>"
                class="game-cover">

        </div>

        <!-- Right Side -->
        <div class="game-right">

            <?php if (!empty($game['badge'])) : ?>

                <span class="game-badge">
                    <?php echo htmlspecialchars($game['badge']); ?>
                </span>

            <?php endif; ?>

            <h1>

                <?php echo htmlspecialchars($game['title']); ?>

            </h1>

            <div class="game-rating">

                ⭐ <?php echo htmlspecialchars($game['rating']); ?>/5

            </div>

            <div class="game-category">

                <?php echo htmlspecialchars($game['category']); ?>

            </div>

            <div class="game-price">

                $<?php echo number_format($game['price'],2); ?>

            </div>

            <div class="game-description">

                <h3>Description</h3>

                <p>

                    <?php echo nl2br(htmlspecialchars($game['description'])); ?>

                </p>

            </div>
             <!-- Action Buttons -->
            <div class="game-actions">

                <button class="buy-btn">
                    <i class="fa-solid fa-bag-shopping"></i>
                    Buy Now
                </button>

                <a href="add_to_cart.php?id=<?php echo $game['id']; ?>" class="cart-btn">

    <i class="fa-solid fa-cart-shopping"></i>

    Add to Cart

</a>
                <button class="wishlist-btn">
                    <i class="fa-solid fa-heart"></i>
                    Wishlist
                </button>

            </div>

            <!-- Game Information -->
            <div class="game-information">

                <h3>Game Information</h3>

                <table>

                    <tr>

                        <td><strong>Category</strong></td>

                        <td><?php echo htmlspecialchars($game['category']); ?></td>

                    </tr>

                    <tr>

                        <td><strong>Rating</strong></td>

                        <td>⭐ <?php echo htmlspecialchars($game['rating']); ?>/5</td>

                    </tr>

                    <tr>

                        <td><strong>Price</strong></td>

                        <td>$<?php echo number_format($game['price'],2); ?></td>

                    </tr>

                    <tr>

                        <td><strong>Status</strong></td>

                        <td>

                            <?php
                            if(!empty($game['badge'])){
                                echo htmlspecialchars($game['badge']);
                            }else{
                                echo "Available";
                            }
                            ?>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</section>
<!-- Related Games -->
<section class="related-games">

    <div class="section-title">

        <h2>🎮 Related Games</h2>

        <p>You may also like these games.</p>

    </div>

    <div class="game-grid">

        <?php

        $related = $conn->query("
            SELECT *
            FROM games
            WHERE id != $id
            ORDER BY RAND()
            LIMIT 4
        ");

        if($related->num_rows > 0){

            while($row = $related->fetch_assoc()){

        ?>

        <div class="game-card">

            <div class="game-image">

                <img src="images/<?php echo htmlspecialchars($row['image']); ?>"
                     alt="<?php echo htmlspecialchars($row['title']); ?>">

                <?php if(!empty($row['badge'])): ?>

                    <span class="new-badge">

                        <?php echo htmlspecialchars($row['badge']); ?>

                    </span>

                <?php endif; ?>

            </div>

            <div class="game-info">

                <h3>

                    <?php echo htmlspecialchars($row['title']); ?>

                </h3>

                <p>

                    <?php echo htmlspecialchars($row['category']); ?>

                </p>

                <div class="rating">

                    ⭐ <?php echo htmlspecialchars($row['rating']); ?>/5

                </div>

                <h4>

                    $<?php echo number_format($row['price'],2); ?>

                </h4>

                <a href="game.php?id=<?php echo $row['id']; ?>" class="buy-btn">

                    View Details

                </a>

            </div>

        </div>

        <?php

            }

        }

        ?>

    </div>

</section>
<?php

$stmt->close();

include 'includes/footer.php';

?>