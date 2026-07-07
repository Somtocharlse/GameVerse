<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';

$message = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    $check = $conn->prepare("SELECT id, username, password FROM users WHERE email=?");

    $check->bind_param("s",$email);

    $check->execute();

    $result = $check->get_result();


    if($result->num_rows > 0){

        $user = $result->fetch_assoc();


        if(password_verify($password,$user['password'])){


            $_SESSION['user_id'] = $user['id'];

            $_SESSION['username'] = $user['username'];


            header("Location: index.php");

            exit();


        }else{

            $message = "Incorrect password.";

        }


    }else{

        $message = "Email not found.";

    }

}


include 'includes/header.php';

?>


<section class="auth-section">


    <div class="auth-container">


        <h2>Login To GameVerse</h2>


        <?php if($message!=""){ ?>


            <div class="message">

                <?php echo $message; ?>

            </div>


        <?php } ?>



        <form method="POST">


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



            <button type="submit" name="login">

                Login

            </button>


        </form>



        <p>

            Don't have an account?

            <a href="register.php">

                Register

            </a>

        </p>


    </div>


</section>



<?php include 'includes/footer.php'; ?>