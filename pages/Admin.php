<?php
include("/inetpub/wwwroot/RE-Software/database_Includes/DBFunctions.php");
startConnection();
session_start();
if (isset($_SESSION["Loggedin"]) == false)
{
    $_SESSION["Loggedin"] = false;
}
if ($_SESSION["Loggedin"] != true)
{
    header("Location: ../index.php");
}
if ($_COOKIE["Username"] != "admin")
{
    header("LOCATION: User.php");
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
<main>
<?php
$query = "SELECT TicketId,MomentMade,Title,Description,Users.Username,State  FROM TICKET INNER JOIN Users ON Ticket.UserId=Users.UserId;";
$result = excuteQuery($query);

    echo "<table border='2px'>";
    echo "<tr>";
    echo "<th>TicketId:</th>";
    echo "<th>MomentMade:</th>";
    echo "<th>Title:</th>";
    echo "<th>Discription:</th>";
    echo "<th>Username:</th>";
    echo "<th>State:</th>";
    echo "<th>Show</th>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $ticketId = $row["TicketId"];
    echo "<tr>";
    echo "<td>" . $row["TicketId"] . "</td>";
    echo "<td>" . $row["MomentMade"] . "</td>";
    echo "<td>" . $row["Title"] . "</td>";
    echo "<td>" . $row["Description"] . "</td>";
    echo "<td>" . $row["Username"] . "</td>";
    echo "<td>" . $row["State"] . "</td>";
    echo "<td><a href='Ticketshow.php?ticketId=$ticketId'>Show</a></td>";
    echo "</tr>";
}

?>
<?php
if (isset($_SESSION["Loggedin"]) == true)
{
    echo "<a href='logout.php'>Logout</a>";
}
?>
</main>
</body>

</html>