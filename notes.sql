DROP DATABASE IF EXISTS notes;

DROP DATABASE IF EXISTS notes;

CREATE DATABASE notes;


use notes;


CREATE TABLE users (
user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
email VARCHAR
(100) NOT NULL,
userPassword VARCHAR(100) NOT NULL

);

drop table users;

select * from users;



CREATE TABLE rememberMe(
rememberMe_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
authentificator1 CHAR
,
f2authentificator2 CHAR
,
user_id INT,
expries DATETIME
);


CREATE TABLE forgotPassword(
forgotPassword_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_id INT,
key_forgotPassword VARCHAR
(10),
time_forgotPassword INT,
status_forgotPassword VARCHAR
(64)

);

CREATE TABLE pictures(
picture_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_id INT,
file_name VARCHAR
(200)
);


CREATE TABLE noteContent(
note_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_id INT,
content text

);

drop table noteContent;
select * from noteContent;

insert into noteContent(user_id,content) values (1,"test");
insert into noteContent(user_id,content) values (1,"test2");
insert into noteContent(user_id,content) values (1,"test3");
select * from noteContent ;
show columns from noteContent;

CREATE TABLE quotes(
quote_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_id INT,
quote_text text
);







CREATE TABLE videos(
video_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_id INT,
url VARCHAR
(100)

);
