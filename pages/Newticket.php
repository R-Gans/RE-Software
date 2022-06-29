<?php
session_start();
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
<form action="User.php" method="post">
    <table>
        <tr>

            <td>
                <label>Titel</label>

            </td>
            <td>
                <input type="text" name="Titel" REQUIRED>
            </td>
        </tr>
        <tr>
            <td>
                <label >Reden van ticket</label>

            </td>
            <td>
                <input type="text" name="Reden" REQUIRED>
            </td>
        </tr>
        <tr>
            <td>
                <button>Submit</button>
            </td>
            <td>

                <input type="hidden" name="State" value="Nieuw">
                <input type="hidden" name="datetime" value="<?php  echo  date("Y-m-d H:i")?>">
            </td>
        </tr>
    </table>
</form>
</body>
</html>