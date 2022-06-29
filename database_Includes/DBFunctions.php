<?php
function startConnection()
{
    global $pdo;

    try
    {
        $pdo = new PDO("odbc:odbc2sqlserver");

        $pdo->query("USE Ticket");
    }
    catch (PDOException $e)
    {
        echo "<h1>Database error</h1>";
        echo $e->getMessage();
        die();
    }
}
function excuteQuery($sql)
{
    global $pdo;

    try
    {
        $result = $pdo->query($sql);

        return $result;
    }
    catch (PDOException $e)
    {
        echo "Er is een probleem met het" . $e->getMessage();
        die();
    }

}

function excuteIntoQuery($query)
{
    global $pdo;
    try
    {
        $rowsAffected = $pdo->exec($query);
    }
    catch(PDOException $exception)
    {
        $rowsAffected = 0;
        echo "<p style='color: red'>Er is een error opgetreden: <br>" . $exception->getMessage(). "</p>";
    }
    return $rowsAffected;
}
?>