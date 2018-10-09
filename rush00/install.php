<?php

require_once('connect_db.php');

function run($dbc, $sql, $process_message) {
    echo $process_message . "...<br/>";
    if (!mysqli_query($dbc, $sql)) {
        echo "    Error: " . mysqli_error($dbc) . "<br/>";
        exit;
    }
}

/* removing old base */
$sql = "DROP DATABASE IF EXISTS " . $db_name;
run($dbc, $sql, "Removing database");

/* creating new database */
$sql = "CREATE DATABASE IF NOT EXISTS " . $db_name;
run($dbc, $sql, "Creating database");
mysqli_select_db($dbc, $db_name);

/* creating table 'users' */
$sql =    "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            login VARCHAR(30) NOT NULL,
            password BINARY(128) NOT NULL,
            type ENUM('common', 'admin') DEFAULT 'common',
            reg_date TIMESTAMP
        )";
run($dbc, $sql, "Creating table 'users'");

/* filling users */
$pass1 = hash('whirlpool', 'pass1');
$pass2 = hash('whirlpool', 'pass2');
$bocal = hash('whirlpool', 'bocal');
$admin = hash('whirlpool', 'admin');
$sql =    "INSERT INTO users (login, password, type) VALUES
            ('osamoile', '".$pass1."', 'common'),
            ('aroi', '".$pass2."', 'common'),
            ('vrusanov', '".$pass2."', 'common'),
            ('osamoile', '".$pass1."', 'common'),
            ('bocal', '".$bocal."', 'admin'),
            ('admin', '".$admin."', 'admin')";
run($dbc, $sql, "Filling data into 'users'");

/* creating table 'categories' */
$sql =    "CREATE TABLE categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL
        )";
run($dbc, $sql, "Creating table 'categories'");

/* filling categories */
$sql =	"INSERT INTO categories (name) VALUES
			('Pizza'),
			('Desserts'),
			('Chicken'),
			('Bread'),
			('Drinks'),
			('Salad')";
run($dbc, $sql, "Filling data into 'categories'");

/* creating table 'items' */
$sql =	"CREATE TABLE items (
			id INT AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(50) NOT NULL,
			price FLOAT DEFAULT '0' NOT NULL,
			img VARCHAR(256) NOT NULL
		)";
run($dbc, $sql, "Creating table 'items'");

/* filling items */
$sql =	"INSERT INTO items (name, price, img) VALUES
			('Pizza Americana', 149.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Americana.jpg?raw=true'),
			('Pizza BBQ Delux', 149.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20BBQ%20Delux.jpg?raw=true'),
			('Pizza BBQ', 104.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20BBQ.jpg?raw=true'),
			('Pizza Bavarian', 127.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Bavarian.jpg?raw=true'),
			('Pizza Carbonara', 127.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Carbonara.jpg?raw=true'),
			('Pizza Country', 127.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Country.jpg?raw=true'),
			('Pizza Five Cheeses', 154.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Five%20Cheeses.jpg?raw=true'),
			('Pizza Hawaiian', 104.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Hawaiian.jpg?raw=true'),
			('Pizza Margarita', 80.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Margarita.jpg?raw=true'),
			('Pizza MitZZa', 154.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20MitZZa.jpg?raw=true'),
			('Pizza Munich DeLUX', 149.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Munich%20DeLUX.jpg?raw=true'),
			('Pizza PaparaZZi', 127.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20PaparaZZi.jpg?raw=true'),
			('Pizza Pepperoni Blues', 104.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Pepperoni%20Blues.jpg?raw=true'),
			('Pizza Pepperoni with tomatoes', 80.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Pepperoni%20with%20tomatoes.jpg?raw=true'),
			('Pizza Provence', 127.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Provence.jpg?raw=true'),
			('Pizza Spicy', 149.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Spicy.jpg?raw=true'),
			('Pizza Spinach and Feta', 154.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Spinach%20and%20Feta.jpg?raw=true'),
			('Pizza Texas', 80.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Texas.jpg?raw=true'),
			('Pizza Tony Pepperoni', 104.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Tony%20Pepperoni.jpg?raw=true'),
			('Pizza Toscana', 149.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Toscana.jpg?raw=true'),
			('Pizza Tuna', 149.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Tuna.jpg?raw=true'),
			('Pizza Veggie Feast', 127.99, 'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/pizza/Pizza%20Veggie%20Feast.jpg?raw=true'),
			('Chocolate muffin', 24.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/dessert/Chocolate%20muffin.jpg?raw=true'),
			('Chocolate rolls', 57.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/dessert/Chocolate%20rolls.jpg?raw=true'),
			('Lava Cake', 47.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/dessert/Lava%20Cake.jpg?raw=true'),
			('Vanilla muffin', 24.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/dessert/Vanilla%20muffin.jpg?raw=true'),
			('Сinnamon Bites', 44.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/dessert/Сinnamon%20Bites.jpg?raw=true'),
			('Chicken strips', 94.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/chicken/Chicken%20strips.jpg?raw=true'),
			('BBQ wings', 94.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/chicken/BBQ%20wings.jpg?raw=true'),
			('Spicy wings', 94.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/chicken/Spicy%20wings.jpg?raw=true'),
			('Сhicken wings', 94.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/chicken/Сhicken%20wings.jpg?raw=true'),
			('Bread with bacon and jalapenos',75.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/bread/Bread%20with%20bacon%20and%20jalapenos.jpg?raw=true'),
			('Bread with bavarian sausages and tomatoes',75.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/bread/Bread%20with%20bavarian%20sausages%20and%20tomatoes.jpg?raw=true'),
			('Bread with pepperoni, munich sausages and mustard',75.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/bread/Bread%20with%20pepperoni,%20munich%20sausages%20and%20mustard.jpg?raw=true'),
			('Bread with spinach and feta',75.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/bread/Bread%20with%20spinach%20and%20feta.jpg?raw=true'),
			('Parmesan bites',44.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/bread/Parmesan%20bites.jpg?raw=true'),
			('Сheese bread',61.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/bread/Сheese%20bread.jpg?raw=true'),
			('Apple juice Rich',39,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Apple%20juice%20Rich.jpg?raw=true'),
			('Apple-grape nectar Rich',39,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Apple-grape%20nectar%20Rich.jpg?raw=true'),
			('Beer Carling',35,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Beer%20Carling.jpg?raw=true'),
			('Beer Obolon Non-alcoholic',32,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Beer%20Obolon%20Non-alcoholic.jpg?raw=true'),
			('Beer Zlata Praga',33,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Beer%20Zlata%20Praga.jpg?raw=true'),
			('BonAqua non-carb',20,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/BonAqua%20non-carb.jpg?raw=true'),
			('BonAqua',20,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/BonAqua.jpg?raw=true'),
			('Coca-Cola 0,5',29,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Coca-Cola%200,5.jpg?raw=true'),
			('Coca-Cola Zero 0,5',29,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Coca-Cola%20Zero%200,5.jpg?raw=true'),
			('Coca-Cola Zero',22,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Coca-Cola%20Zero.jpg?raw=true'),
			('Coca-Cola',22,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Coca-Cola.jpg?raw=true'),
			('Exotic nectar Rich',39,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Exotic%20nectar%20Rich.jpg?raw=true'),
			('FUZE TEA LEMON',29,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/FUZE%20TEA%20LEMON.jpg?raw=true'),
			('FUZE TEA PEACH',29,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/FUZE%20TEA%20PEACH.jpg?raw=true'),
			('Fanta 0,5',29,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Fanta%200,5.jpg?raw=true'),
			('Orange nectar Rich',39,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Orange%20nectar%20Rich.jpg?raw=true'),
			('Paulaner Hefe-Weissbier',69.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Paulaner%20Hefe-Weissbier.jpg?raw=true'),
			('Paulaner Oktoberfest',69.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Paulaner%20Oktoberfest.jpg?raw=true'),
			('Paulaner Original',69.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Paulaner%20Original.jpg?raw=true'),
			('Sprite 0,5',29,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Sprite%200,5.jpg?raw=true'),
			('Sprite',22,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Sprite.jpg?raw=true'),
			('Tomato juice Rich',39,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/drinks/Tomato%20juice%20Rich.jpg?raw=true'),
			('Chicken salad',69.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/salad/Chicken%20salad.jpg?raw=true'),
			('Mozzarella Salad',69.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/salad/Mozzarella%20Salad.jpg?raw=true'),
			('Salad with spinach',69.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/salad/Salad%20with%20spinach.jpg?raw=true'),
			('Tuna salad',79.99,'https://github.com/olehsamoilenko/resources/blob/master/Piscine-PHP/rush00/salad/Tuna%20salad.jpg?raw=true')";

run($dbc, $sql, "Filling data into 'items'");

/* creating table 'list' */
$sql =	"CREATE TABLE list (
			id INT AUTO_INCREMENT PRIMARY KEY,
			item_id INT NOT NULL,
			category_id INT NOT NULL
		)";
run($dbc, $sql, "Creating table 'list'");

/* filling list */
$sql =	"INSERT INTO list (item_id, category_id) VALUES
			( 1,1),
			( 2,1),
			( 3,1),
			( 4,1),
			( 5,1),
			( 6,1),
			( 7,1),
			( 8,1),
			( 9,1),
			(10,1),
			(11,1),
			(12,1),
			(13,1),
			(14,1),
			(15,1),
			(16,1),
			(17,1),
			(18,1),
			(19,1),
			(20,1),
			(21,1),
			(22,1),
			(23,2),
			(24,2),
			(25,2),
			(26,2),
			(27,2),
			(28,3),
			(29,3),
			(30,3),
			(31,3),
			(32,4),
			(33,4),
			(34,4),
			(35,4),
			(36,4),
			(37,4),
			(38,5),
			(39,5),
			(40,5),
			(41,5),
			(42,5),
			(43,5),
			(44,5),
			(45,5),
			(46,5),
			(47,5),
			(48,5),
			(49,5),
			(50,5),
			(51,5),
			(52,5),
			(53,5),
			(54,5),
			(55,5),
			(56,5),
			(57,5),
			(58,5),
			(59,5),
			(60,6),
			(61,6),
			(62,6),
			(63,6)";
run($dbc, $sql, "Filling data into 'list'");

/* creating table 'orders' */
$sql =	"CREATE TABLE orders (
			id INT AUTO_INCREMENT PRIMARY KEY,
			user_id INT NOT NULL,
			item_id INT NOT NULL,
			order_date TIMESTAMP
		)";
run($dbc, $sql, "Creating table 'orders'");

/* filling orders */
$sql =	"INSERT INTO orders (user_id, item_id) VALUES
			(1, 20),
			(1, 20),
			(2, 22),
			(2, 15),
			(2, 15),
			(2, 14),
			(2, 34),
			(2, 35),
			(2, 60),
			(3, 2),
			(4, 15),
			(4, 55),
			(4, 55),
			(6, 45),
			(6, 32)";
run($dbc, $sql, "Filling data into 'list'");

mysqli_close($dbc);