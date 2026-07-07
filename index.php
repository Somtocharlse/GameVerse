<?php
require_once 'config.php';
include 'includes/header.php';
?>

<!-- Hero Banner Section -->
<section class="hero">

    <div class="hero-slider">

        <div class="slide active">
            <img src="images/banner1.jpg" alt="Banner 1">
            <div class="hero-content">
                <h1>WELCOME TO GAMEVERSE</h1>
                <p>Your Ultimate Gaming Store</p>
                <a href="#featured" class="hero-btn">Explore Games</a>
            </div>
        </div>

        <div class="slide">
            <img src="images/banner2.jpg" alt="Banner 2">
            <div class="hero-content">
                <h1>DISCOVER NEW WORLDS</h1>
                <p>Adventure Starts Here</p>
                <a href="#featured" class="hero-btn">Browse Games</a>
            </div>
        </div>

        <div class="slide">
            <img src="images/banner3.jpg" alt="Banner 3">
            <div class="hero-content">
                <h1>BEST SELLING GAMES</h1>
                <p>Play the Most Popular Titles</p>
                <a href="#featured" class="hero-btn">Shop Now</a>
            </div>
        </div>

        <div class="slide">
            <img src="images/banner4.jpg" alt="Banner 4">
            <div class="hero-content">
                <h1>JOIN THE COMMUNITY</h1>
                <p>Thousands of Players Worldwide</p>
                <a href="#featured" class="hero-btn">Start Playing</a>
            </div>
        </div>

        <div class="slide">
            <img src="images/banner5.jpg" alt="Banner 5">
            <div class="hero-content">
                <h1>LIMITED TIME DEALS</h1>
                <p>Save More on Your Favorite Games</p>
                <a href="#featured" class="hero-btn">View Deals</a>
            </div>
        </div>

    </div>

    <div class="slider-buttons">
        <span class="prev">&#10094;</span>
        <span class="next">&#10095;</span>
    </div>

</section>
<!-- Featured Games -->
<section id="featured" class="featured-section">

    <div class="section-title">
        <h2>Featured Games</h2>
        <p>Discover our most popular games.</p>
    </div>

    <div class="game-grid">

    <?php

    $featured = $conn->query("SELECT * FROM games ORDER BY id DESC LIMIT 8");

    if($featured->num_rows > 0){

        while($game = $featured->fetch_assoc()){

    ?>

        <div class="game-card">

            <div class="game-image">

                <img src="images/<?php echo $game['image']; ?>" alt="<?php echo $game['title']; ?>">

                <span class="price">

                    $<?php echo number_format($game['price'],2); ?>

                </span>

            </div>

            <div class="game-info">

                <h3><?php echo $game['title']; ?></h3>

                <p><?php echo $game['category']; ?></p>

                <div class="rating">

                    ⭐ <?php echo $game['rating']; ?>/5

                </div>

                <div class="card-buttons">

                    <button class="wishlist-btn">

                        <i class="fa-solid fa-heart"></i>

                    </button>

                    <button class="cart-btn">

                        <i class="fa-solid fa-cart-shopping"></i>

                    </button>

                </div>

            </div>

        </div>

    <?php

        }

    }else{

        echo "<h3>No games available.</h3>";

    }

    ?>

    </div>

</section>
<!-- Trending Games -->
<section id="trending" class="trending-section">

    <div class="section-title">
        <h2>🔥 Trending Games</h2>
        <p>Most played games this week.</p>
    </div>

    <div class="game-grid">

    <?php

    $trending = $conn->query("SELECT * FROM games ORDER BY rating DESC LIMIT 4");

    if($trending->num_rows > 0){

        while($game = $trending->fetch_assoc()){

    ?>

        <div class="game-card">

            <div class="game-image">

                <img src="images/<?php echo $game['image']; ?>" alt="<?php echo $game['title']; ?>">

            </div>

            <div class="game-info">

                <h3><?php echo $game['title']; ?></h3>

                <p><?php echo $game['category']; ?></p>

                <div class="rating">

                    ⭐ <?php echo $game['rating']; ?>/5

                </div>

                <h4>$<?php echo number_format($game['price'],2); ?></h4>

                <a href="game.php?id=<?php echo $game['id']; ?>" class="buy-btn">
    Buy Now
</a>
            </div>

        </div>

    <?php

        }

    }

    ?>

    </div>

</section>
<!-- Categories -->
<section id="categories" class="categories-section">

    <div class="section-title">
        <h2>🎯 Browse Categories</h2>
        <p>Choose your favorite gaming genre.</p>
    </div>

    <div class="category-grid">

        <div class="category-card">
            <i class="fa-solid fa-crosshairs"></i>
            <h3>Action</h3>
        </div>

        <div class="category-card">
            <i class="fa-solid fa-futbol"></i>
            <h3>Sports</h3>
        </div>

        <div class="category-card">
            <i class="fa-solid fa-car"></i>
            <h3>Racing</h3>
        </div>

        <div class="category-card">
            <i class="fa-solid fa-dragon"></i>
            <h3>RPG</h3>
        </div>

        <div class="category-card">
            <i class="fa-solid fa-skull"></i>
            <h3>Horror</h3>
        </div>

        <div class="category-card">
            <i class="fa-solid fa-gun"></i>
            <h3>FPS</h3>
        </div>

        <div class="category-card">
            <i class="fa-solid fa-chess-knight"></i>
            <h3>Adventure</h3>
        </div>

        <div class="category-card">
            <i class="fa-solid fa-earth-americas"></i>
            <h3>Open World</h3>
        </div>

    </div>

</section>
<!-- Deal of the Week -->
<section class="deal-section">

    <div class="deal-content">

        <div class="deal-text">

            <span class="deal-badge">🔥 Deal of the Week</span>

            <h2>Save Up To 70%</h2>

            <p>
                Grab the hottest games at unbeatable prices.
                Limited-time offers available only on GameVerse.
            </p>

            <a href="#featured" class="deal-btn">
                Shop Now
            </a>

        </div>

        <div class="deal-image">

            <img src="images/banner3.jpg" alt="Deal of the Week">

        </div>

    </div>

</section>
<!-- New Releases -->
<section class="new-release-section">

    <div class="section-title">

        <h2>🆕 New Releases</h2>

        <p>Latest games added to GameVerse.</p>

    </div>

    <div class="game-grid">

    <?php

    $newGames = $conn->query("SELECT * FROM games ORDER BY id DESC LIMIT 4");

    if($newGames->num_rows > 0){

        while($game = $newGames->fetch_assoc()){

    ?>

        <div class="game-card">

            <div class="game-image">

                <img src="images/<?php echo $game['image']; ?>" alt="<?php echo $game['title']; ?>">

                <span class="new-badge">NEW</span>

            </div>

            <div class="game-info">

                <h3><?php echo $game['title']; ?></h3>

                <p><?php echo $game['category']; ?></p>

                <div class="rating">

                    ⭐ <?php echo $game['rating']; ?>/5

                </div>

                <h4>$<?php echo number_format($game['price'],2); ?></h4>

                <a href="game.php?id=<?php echo $game['id']; ?>" class="buy-btn">
    Buy Now
</a>

            </div>

        </div>

    <?php

        }

    }

    ?>

    </div>

</section>
<!-- Most Wishlisted -->
<section class="wishlist-section">

    <div class="section-title">

        <h2>❤️ Most Wishlisted</h2>

        <p>The games everyone wants to play.</p>

    </div>

    <div class="game-grid">

    <?php

    $wishlist = $conn->query("SELECT * FROM games ORDER BY rating DESC LIMIT 4");

    if($wishlist->num_rows > 0){

        while($game = $wishlist->fetch_assoc()){

    ?>

        <div class="game-card">

            <div class="game-image">

                <img src="images/<?php echo $game['image']; ?>" alt="<?php echo $game['title']; ?>">

            </div>

            <div class="game-info">

                <h3><?php echo $game['title']; ?></h3>

                <p><?php echo $game['category']; ?></p>

                <div class="rating">

                    ⭐ <?php echo $game['rating']; ?>/5

                </div>

                <h4>$<?php echo number_format($game['price'],2); ?></h4>

                <div class="card-buttons">

                    <button class="wishlist-btn">
                        <i class="fa-solid fa-heart"></i>
                    </button>

                    <button class="cart-btn">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>

                </div>

            </div>

        </div>

    <?php

        }

    }

    ?>

    </div>

</section>
<!-- Gamer Reviews -->
<section id="reviews" class="reviews-section">

    <div class="section-title">

        <h2>💬 What Gamers Say</h2>

        <p>Trusted by players around the world.</p>

    </div>

    <div class="reviews-container">

        <!-- Review 1 -->
        <div class="review-card">

            <img src="images/alex.jpg" alt="Alex Johnson" class="review-avatar">

            <div class="stars">⭐⭐⭐⭐⭐</div>

            <p>
                "GameVerse has an amazing collection of games.
                The website is fast, clean, and easy to use."
            </p>

            <h4>— Alex Johnson</h4>

        </div>

        <!-- Review 2 -->
        <div class="review-card">

            <img src="images/sarah.jpg" alt="Sarah Williams" class="review-avatar">

            <div class="stars">⭐⭐⭐⭐⭐</div>

            <p>
                "I found my favorite games with great discounts.
                Highly recommended!"
            </p>

            <h4>— Sarah Williams</h4>

        </div>

        <!-- Review 3 -->
        <div class="review-card">

            <img src="images/michael.jpg" alt="Michael Brown" class="review-avatar">

            <div class="stars">⭐⭐⭐⭐⭐</div>

            <p>
                "Beautiful interface and smooth browsing experience.
                It feels like a real game store."
            </p>

            <h4>— Michael Brown</h4>

        </div>

    </div>

</section>
<!-- Statistics -->
<section class="stats-section">

    <div class="stats-container">

        <div class="stat-box">
            <h2>20+</h2>
            <p>Games Available</p>
        </div>

        <div class="stat-box">
            <h2>5K+</h2>
            <p>Happy Players</p>
        </div>

        <div class="stat-box">
            <h2>98%</h2>
            <p>Positive Reviews</p>
        </div>

        <div class="stat-box">
            <h2>24/7</h2>
            <p>Support</p>
        </div>

    </div>

</section>
<!-- About GameVerse -->
<section id="about" class="about-section">

    <div class="about-content">

        <div class="about-text">

            <h2>About GameVerse</h2>

            <p>
                GameVerse is a modern online game store built for gamers who
                love discovering, collecting, and exploring the best PC games.
                Browse top titles, discover new releases, and enjoy a premium
                gaming experience.
            </p>

            <ul>

                <li><i class="fa-solid fa-check"></i> Premium Game Collection</li>

                <li><i class="fa-solid fa-check"></i> Fast & Secure Platform</li>

                <li><i class="fa-solid fa-check"></i> Trusted by Thousands of Gamers</li>

                <li><i class="fa-solid fa-check"></i> Regular Game Updates</li>

            </ul>

        </div>

        <div class="about-image">

            <img src="images/about.jpg" alt="About GameVerse">

        </div>

    </div>

</section>

<!-- Newsletter -->
<section class="newsletter-section">

    <div class="newsletter-content">

        <h2>📧 Subscribe to Our Newsletter</h2>

        <p>
            Be the first to know about new game releases, special offers,
            and exclusive discounts.
        </p>

        <form class="newsletter-form">

            <input
                type="email"
                placeholder="Enter your email address"
                required>

            <button type="submit">
                Subscribe
            </button>

        </form>

    </div>

</section>
<!-- Social Media -->
<section class="social-section">

    <h2>Follow GameVerse</h2>

    <div class="social-icons">

        <a href="#" title="Facebook">
            <i class="fa-brands fa-facebook-f"></i>
        </a>

        <a href="#" title="Instagram">
            <i class="fa-brands fa-instagram"></i>
        </a>

        <a href="#" title="X (Twitter)">
            <i class="fa-brands fa-x-twitter"></i>
        </a>

        <a href="#" title="YouTube">
            <i class="fa-brands fa-youtube"></i>
        </a>

        <a href="#" title="Discord">
            <i class="fa-brands fa-discord"></i>
        </a>

        <a href="#" title="Twitch">
            <i class="fa-brands fa-twitch"></i>
        </a>

        <a href="#" title="TikTok">
            <i class="fa-brands fa-tiktok"></i>
        </a>

    </div>

</section>

<?php include 'includes/footer.php'; ?>