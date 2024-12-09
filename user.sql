USE poemsy;

CREATE TABLE Users (
first_name varchar(255) NOT NULL,
last_name varchar(255) NOT NULL,
user_id INT PRIMARY KEY auto_increment,
username varchar(255) NOT NULL,
email varchar(255) unique NOT NULL,
password varchar(255) NOT NULL
);

CREATE TABLE Posts (
poem_id INT PRIMARY KEY auto_increment,
title varchar(255) NOT NULL,
category ENUM('Romance', 'War', 'Fame', 'Parenthood', 'Loss') NOT NULL,
content TEXT NOT NULL,
user_id INT NOT NULL,
FOREIGN KEY (user_id) REFERENCES Users(user_id)
)ENGINE=InnoDB;

CREATE TABLE Likes (
user_id INT NOT NULL,
poem_id INT NOT NULL,
FOREIGN KEY (user_id) REFERENCES Users(user_id),
FOREIGN KEY (poem_id) REFERENCES Posts(poem_id)
)ENGINE=InnoDB;

CREATE TABLE Comments (
comment TEXT NOT NULL,
user_id INT NOT NULL,
poem_id INT NOT NULL,
FOREIGN KEY (user_id) REFERENCES Users(user_id),
FOREIGN KEY (poem_id) REFERENCES Posts(poem_id)
)ENGINE=InnoDB;
