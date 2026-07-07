<nav class="navbar">

    <div class="logo">
        <a href="index.php">
            <i class="fa-solid fa-gamepad"></i>
            <span>GameVerse</span>
        </a>
    </div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#featured">Featured</a></li>
        <li><a href="#trending">Trending</a></li>
        <li><a href="#categories">Categories</a></li>
        <li><a href="#reviews">Reviews</a></li>
        <li><a href="#about">About</a></li>
    </ul>

    <div class="nav-right">

        <div class="search-box">
            <input type="text" placeholder="Search Games...">
            <button>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>

        <a href="#" class="icon-btn">
            <i class="fa-solid fa-heart"></i>
        </a>

        <a href="#" class="icon-btn">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>

        <?php if(isset($_SESSION['username'])): ?>

            <a href="logout.php" class="login-btn">Logout</a>

        <?php else: ?>

            <a href="login.php" class="login-btn">Login</a>

            <a href="register.php" class="register-btn">Register</a>

        <?php endif; ?>

    </div>

</nav>