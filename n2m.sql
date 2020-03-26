CREATE TABLE 'customer' (
  idcustomer int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  emailaddress varchar(45) NOT NULL UNIQUE,
  md5password varchar(45),
  logintime timestamp,
  lastactivitytime timestamp,
  logouttime timestamp,
  confirmed int
);

CREATE TABLE 'images' (
  imageid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  customerid int NOT NULL,
  mime_type varchar(255) NOT NULL,
  file_size int(255) NOT NULL,
  filename varchar(255) NOT NULL,
  file_data mediumblob NOT NULL
);

CREATE TABLE 'note' (
  noteid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  customerid int NOT NULL UNIQUE,
  notetext text
);

CREATE TABLE 'tbd' (
  tbdid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  customerid int NOT NULL,
  tbdtext text
);

CREATE TABLE 'website' (
  websiteid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  customerid int NOT NULL,
  websiteurl varchar(255)
);
