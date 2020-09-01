CREATE TABLE geek (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50)
);


INSERT INTO geek (firstname, username, password, email)
VALUES ('myname', 'test', 'test', 'myname@example.com');