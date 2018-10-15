<?php
    function db($query, $params = []) {
        $connection = new PDO("mysql:host=" . SQL_HOST . ";dbname=" . SQL_DATABASE, SQL_USER, SQL_PASSWORD);
        $sql = $connection->prepare($query);
        $sql->execute($params);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>