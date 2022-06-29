<?php
session_start();

if (isset($_SESSION["Loggedin"]) == true) {
    if ($_SESSION["Loggedin"] == true) {
        header("Location: pages/logincheck.php");
    }
}
?>

<?php
/**
 * User: Ryan Gans
 * Date: 4-4-2022
 * File: index.php
 */
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KW1C</title>
</head>
<body>
<header>
</header>
<main id="main">
    <table>
        <form action="pages/logincheck.php" method="post">
            <tr>
                <td>
                    <?php
                    if (isset($_COOKIE["showMessage"]) == true)
                    {
                        if ($_COOKIE["showMessage"] == 2)
                        {
                            echo "Uw username of password in incorrect";
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Username</label>
                    <input type="text" name="userNameTxt" REQUIRED>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Password</label>
                    <input type="password" name="passWordTxt" REQUIRED>
                </td>
            </tr>
            <tr>
                <td>
                    <button style="margin-left: 30%">Submit</button>
                </td>
            </tr>
        </form>
    </table>
</main>
</body>
</html>

</body>
</html>