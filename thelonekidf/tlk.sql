
create database tlk;

CREATE TABLE `users` (
 `name` varchar(30) NOT NULL,
 `email` varchar(30) NOT NULL,
 `password` varchar(20) NOT NULL,
 `dob` date NOT NULL,
 `gender` varchar(10) NOT NULL,
 `city` varchar(30) NOT NULL,
 `dateTime` datetime NOT NULL,
 `about` varchar(200) DEFAULT NULL,
 `proPic` blob NOT NULL
);

CREATE TABLE `posts` (
 `email` varchar(30) NOT NULL,
 `postID` int(11) NOT NULL AUTO_INCREMENT,
 `postTitle` varchar(30) NOT NULL,
 `post` varchar(20000) NOT NULL,
 `date` datetime NOT NULL,
 `privacy` varchar(20) NOT NULL,
 PRIMARY KEY (`postID`)
) ;


CREATE TABLE `images` (
 `picID` int(11) NOT NULL,
 `email` varchar(30) DEFAULT NULL,
 `description` varchar(40) DEFAULT NULL,
 `image` blob
);