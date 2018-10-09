<?php
require_once('connect_db.php');
if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['login'] && $_POST['password']) {
    $sql = "SELECT id, login, password FROM users";
    $result = mysqli_query($dbc, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['login'] == $_POST['login'] && $row['password'] ==  $_POST['password']) {
                $sql = "DELETE FROM users WHERE login='" . $row['login'] . "'";
                mysqli_query($dbc, $sql);
                echo "SUCCESS<br/>";
                header('Location: log_in.php');
                mysqli_close($dbc);
                break;
            }
        }
    }
}
