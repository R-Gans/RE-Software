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
if (isset($_GET["ticketId"]) == true) {
    $ticketId = $_GET["ticketId"];
}
else if (isset($_POST["ticketId"]) == true)
{
    $ticketId = $_POST["ticketId"];
}
else
{
    header("LOCATION: ../Index.php");
}
$userid = $_SESSION["UserId"];
if (isset($_POST["Message"]) == true && isset($_POST["Momentsent"]) == true)
{

    $message = $_POST["Message"];
    $Momentsent = $_POST["Momentsent"];
    $query = "INSERT INTO Message (UserId, TicketId,Message, MomentsSent) VALUES('$userid', ''$ticketId, '$message', '$Momentsent')";
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
    <link rel="stylesheet" href="../styles/Ticketshow.css">
</head>
<body>
<header>
    <?php
    if (isset($_SESSION["Loggedin"]) == true)
    {
        echo "<a href='logout.php'>Logout</a>";
    }
    $query = "SELECT TicketId,MomentMade,Title,Description,Users.Username,State  FROM TICKET INNER JOIN Users ON Ticket.UserId=Users.UserId WHERE TicketId ='$ticketId'";
    $result = excuteQuery($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    ?>
    <h2>
        Ticket: <?php echo  $row["Title"] ?>

    </h2>

</header>
<main>
    <div id="Info">
        <p>
            Username: <?php echo  $row["Username"] ?>

        </p>
        <p>
            Creationdate:  <?php echo  $row["MomentMade"] ?>
        </p>
        <p>
            Description: <?php echo  $row["Description"] ?>

        </p>
    </div>
    <section>
        <?php
            $query = "SELECT * FROM Message WHERE TicketId = '$ticketId' ORDER BY MomentSent"
        ?>
    </section>
</main>
<footer>


    <form action="Ticketshow.php" method="post">
        <input id="Message_box" type="text" name="Message">
        <input type="hidden" name="ticketId" value="<?php echo $ticketId?>">
        <input type="hidden" name="userId" value="<?php $userid ?>">
        <input type="hidden" name="Momentsent" value="<?php  echo  date("Y-m-d H:i")?>">
        <button>Send</button>
    </form>
</footer>
</body>
</html>