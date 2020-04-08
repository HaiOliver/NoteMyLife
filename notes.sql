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

insert into users(email,userPassword) values("test",123132131);


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

select * from pictures;




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
author text,
quote_text text
);

drop table quotes;
insert into quotes(user_id,author,quote_text)values(1,"Oliver","never give up");
insert into quotes(user_id,author,quote_text)values(2,"Oliv"," give up");
insert into quotes(user_id,author,quote_text)values(1,"Oivr","never ge up");
insert into quotes(user_id,author,quote_text)values(1,"Oler","neve give up");


CREATE TABLE videos(
video_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_id INT,
link VARCHAR
(100)

);

select * from videos;
insert into videos(user_id,link) values(1,"https://www.youtube.com/embed/AIenodWtwJ0");

drop table videos;
