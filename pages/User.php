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
    header("Location: login.php");
}
if (isset($_POST["Titel"]) == true && isset($_POST["Reden"]) == true && isset($_POST["userId"]) == true && isset($_POST["State"]) == true && isset($_POST["datetime"]) == true)
{
    $Titel = $_POST["Titel"];
    $Reden = $_POST["Reden"];
    $userId = $_SESSION["UserId"];
    $state = $_POST["State"];
    $datetime = $_POST["datetime"];
    $query = "INSERT INTO Ticket(MomentMade, Title, Description, UserId, State) VALUES('$datetime', '$Titel', '$Reden', '$userId', '$state')";
    excuteQuery($query);
    header("LOCATION: User.php");
}
if ($_COOKIE["Username"] == "admin")
{
    header("LOCATION: Admin.php");
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
<mian>
    <div style="position: relative">

    <?php
    $query = "SELECT TicketId,MomentMade,Title,Description,Users.Username,State  FROM Ticket INNER JOIN Users ON Ticket.UserId=Users.UserId WHERE Users.UserId =". $_SESSION["UserId"];
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
        </div>
    <?php
    if (isset($_SESSION["Loggedin"]) == true)
    {
        echo "<a href='logout.php'>Logout</a>";
    }
    ?>
    <div style="position: relative">
    <h2>
        Creer hier een nieuwe ticket:
    </h2>
        <a href="Newticket.php">Nieuwe ticket</a>
    </div>
    <h2>Uw momentele tickets</h2>
</mian>
</body>
</html>
