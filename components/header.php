<?php
    session_start()
?>

<style>
    header {
        background-color: white;
        padding: 20px;
    }

    h1 {
        font-size: 5rem;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        margin-bottom: 20px;
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f2f2f2;
        padding: 10px;
        border-radius: 5px;
    }

    nav a {
        margin-right: 10px;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: none;
        color: #333;
        padding: 5px;
        border-radius: 3px;
    }

    nav a:hover {
        background-color: #ddd;
    }

    nav .user-info {
        display: flex;
        align-items: center;
        margin-left: auto; 
    }

    form {
            margin-top: 10px;
    }
        

    nav .user-info form {
        margin-left: 10px;
        display: flex;
        align-items: center;
    }

    nav .user-info input[type="submit"] {
        background-color: #333;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        cursor: pointer;
    }

    nav .user-info input[type="submit"]:hover {
        background-color: #555;
    }
</style>

<header>
    <h1>Daily Blog</h1>
    <hr>
    <nav>
        <div>
            <a href="main.php">Home</a>
            <a href="about.php">About</a>
            <?php
            if (!empty($_SESSION["username"])) {
                echo '<a href="dashboard.php">Write</a>';
            }
            ?>
            <?php
            if (empty($_SESSION["username"])) {
                echo '<a href="signup.php">Sign up</a>';
            }
            ?>
            
        </div>
        <div class="user-info">
            <?php
            if (!empty($_SESSION["username"])) {
                // echo '<span>' . $_SESSION["username"] . '</span>';
                echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
                echo '<input type="submit" name="logout" value="Logout"/>';
                echo '</form>';
            }
            ?>
        </div>
    </nav>
    <hr>
</header>
