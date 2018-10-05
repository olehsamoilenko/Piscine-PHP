CREATE TABLE user_card
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	last_name VARCHAR(30),
	birthdate DATE NOT NULL
);

INSERT INTO user_card(last_name, birthdate) VALUES
	('samoilenko',	'2013-05-01'),
	('roi',			'2014-01-01'),
	('miroshnik',	'2011-04-27'),
	('shevchenko',	'2014-03-01'),
	('sarry',		'2014-03-01'),
	('sitko',		'2014-07-01'),
	('tokar',		'2014-07-01'),
	('lyshuga',		'2014-07-01'),
	('kuhar',		'2014-07-01'),
	('red',			'2014-07-01'),
	('green',		'2014-07-15'),
	('black',		'2014-07-15'),
	('white',		'2014-07-15'),
	('gray',		'2014-07-15'),
	('apple',		'2014-07-15'),
	('banana',		'2014-03-15'),
	('strawberry',	'2014-03-15'),
	('father',		'2014-11-15'),
	('past',		'2014-11-15'),
	('last',		'2014-11-15'),
	('handle',		'2014-03-15'),
	('cat',			'2014-03-01'),
	('maslova',		'2010-04-03');