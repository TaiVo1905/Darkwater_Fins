create database darkwater_fins;
use darkwater_fins;

create table users (
	user_id int primary key,
    user_name varchar(40) not null,
    user_img_url varchar(250),
    email varchar(50) not null,
    passwords varchar(30) not null,
    address varchar(250),
    phone_number varchar(11),
    roles boolean default 0
);

create table Aquarium_Fishs (
	fish_id int primary key,
    fish_name varchar(50) not null,
    fish_img_url varchar(250) not null,
    fish_price float not null,
    fish_sub varchar(100),
    fish_description text,
    fish_stock int default 0,
    fish_category varchar(40),
    purchases int default 0
);
