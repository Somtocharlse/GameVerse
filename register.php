<?php
require_once 'config.php';

$message = "";

if(isset($_POST['register'])){

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if($password != $confirmPassword){

        $message = "Passwords do not match.";

    }else{

        $check = $conn->prepare("SELECT id FROM users WHERE email=?");
        $check->bind_param("s",$email);
        $check->execute();
        $result = $check->get_result();

        if($result->num_rows > 0){

            $message = "Email already exists.";

        }else{

            $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

            $insert = $conn->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");

            $insert->bind_param("sss",$username,$email,$hashedPassword);

            if($insert->execute()){

                $message = "Registration successful! You can now login.";

            }else{

                $message = "Registration failed.";

            }

        }

    }

}

include 'includes/header.php';
?>

<section class="auth-section">

    <div class="auth-container">

        <h2>Create Account</h2>

        <?php if($message!=""){ ?>

            <div class="message">

                <?php echo $message; ?>

            </div>

        <?php } ?>

        <form method="POST">

            <input
                type="text"
                name="username"
                placeholder="Username"
                required>

            <input
                type="email"
                name="email"
                placeholder="Email"
                required>

            <input
                type="password"
                name="password"
                placeholder="Password"
                required>

            <input
                type="password"
                name="confirm_password"
                placeholder="Confirm Password"
                required>

            <button type="submit" name="register">

                Register

            </button>

        </form>

        <p>

            Already have an account?

            <a href="login.php">

                Login

            </a>

        </p>

    </div>

</section>

<?php include 'includes/footer.php'; ?>