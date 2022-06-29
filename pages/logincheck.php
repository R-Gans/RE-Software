<?php
session_start();

if (isset($_SESSION["Loggedin"]) == false)
{
    $_SESSION["Loggedin"] = false;
}

if (isset($_POST["userNameTxt"]) == true && isset($_POST["passWordTxt"]) == true) {

    include("/inetpub/wwwroot/RE-Software/database_Includes/DBFunctions.php");
    startConnection();
    $sql = "SELECT * FROM Users WHERE Username = '" . $_POST["userNameTxt"] . "'AND Password = '" . $_POST["passWordTxt"] . "'";
    $result = excuteQuery($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $username = $_POST["userNameTxt"];
    $_SESSION["UserId"] = $row["UserId"];
        setcookie("Username", $username, time() + (60*60*24*365), "/");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<header>

</header>
<?php
if (isset($_POST["userNameTxt"]) == true && isset($_POST["passWordTxt"]) == true)
{

    if ($row == false) {
        setcookie("showMessage", 2, time() + (60 * 60 * 24 * 365), "/");
        header("Location: ../index.php");

    } else {
        $_SESSION["Loggedin"] = true;
        $_COOKIE["Username"] = $_POST["userNameTxt"];
        if ($_COOKIE["Username"] == "admin")
        {
            header("LOCATION: Admin.php");
        }
        else
        {
            header("LOCATION: User.php");
        }
    }
}

if ($_SESSION["Loggedin"] != true)
{
    header("Location: ../index.php");
}
?>
<main id="main">
    <h2>
        Welkom, <?php
        if (isset($_COOKIE["Username"]) == true)
        {
            echo $_COOKIE["Username"];
        }
        else
        {
            header("LOCATION: ../index.php");
            $_SESSION["Loggedin"] = false;
        }
        ?>
    </h2>
    <p>

    </p>
    <?php
    if (isset($_SESSION["Loggedin"]) == true)
    {
        echo "<a href='logout.php'>Logout</a>";
    }
    ?>


</main>
<footer>
</body>
</html>