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
    roles boolean
);