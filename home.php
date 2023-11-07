<?php
    session_start();
    if(isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>HOME</title>
    </head>
    <body>
        <h1>Hello World</h1>
        <p><?php echo $_SESSION['username']; ?></p>
        <a href="logout.php">Logout</a>
    </body>
    </html>
<?php
    }
    else {
    header("Location: index.php");
    }
?>