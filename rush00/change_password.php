<?php
    require_once('connect_db.php');
    if ($_POST['login'] && $_POST['submit'] == "OK" && $_POST['old_password'] && $_POST['new_password']){
        $sql = "SELECT login, password FROM users WHERE login='" . $_POST['login'] . "'";
        $result = mysqli_query($dbc, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            var_dump($row);
            if ($row['password'] == $_POST['old_password']) {
                $sql = "UPDATE users SET password ='" . $_POST['new_password'] . "'WHERE login='" . $row['login'] . "'";
                mysqli_query($dbc, $sql);
                echo "OK\n";
                header('Location: log_in.php');
            }
            echo "Error1\n";
            }
        echo "Error2\n";

    }
?>
<html><body>
    <form action="change_password.php" method="POST">
    Login: <input type="text" name="login" value="" />
        <br />
        Old password: <input type="password" name="old_password" value="" />
        <br />
        New password: <input type="password" name="new_password" value="" />
        <br />
        <input type="submit" name="submit" value="OK" />
        <br />
    	<a href="log_in.php">Back to login</a>
    </form>
</body></html>