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

create table Aquariums (
	aquarium_id int primary key auto_increment,
    aquarium_name varchar(50) not null,
    aquarium_img_url varchar(250),
    aquarium_price int not null,
    aquarium_description text,
    aquarium_stock int default(0),
    aquarium_category varchar(40)
);


         
insert into Aquariums (aquarium_name, aquarium_img_url, aquarium_price, aquarium_description, aquarium_stock, aquarium_category)
values 
('Silicone-sealed Glass Aquarium', 'https://i.imgur.com/16kDbZk.jpg', 202.89, 'Using flexible, sturdy glass with high impact resistance, sealed with silicone to prevent leaks.', 150, 'Glass'),
('3-in-1 aquarium', 'https://i.imgur.com/raGVVmt.jpg', 65.88, 'A multifunctional setup combining filtration, lighting, and decoration in one unit.', 200, 'Functional'),
('Molded aquarium', 'https://i.imgur.com/tJQFusj.jpg', 7.79, 'Crafted from a single molded piece, offering lightweight and unique design options.', 120, 'Shaped'),
('Glass jar aquarium', 'https://i.imgur.com/0JeKKxo.jpg', 32.90, 'A small, compact design ideal for Betta fish or as a decorative piece.', 180, 'Glass'),
('Glass Bottle Aquarium', 'https://i.imgur.com/WukbahY.jpg', 2.39, 'A bottle-shaped aquarium, perfect for miniature aquatic setups or as a decorative item.', 100, 'Glass'),
('Cylindrical aquarium', 'https://i.imgur.com/UOyDUJG.jpg', 88.76, 'A cylindrical shape offering a 360-degree view, providing an elegant display for fish.', 250, 'Shaped'),
('Hanging aquarium', 'https://i.imgur.com/laiLxov.jpg', 1.99, 'A space-saving design that hangs from the ceiling or a frame, ideal for small spaces.', 80, 'Mountable'),
('Round aquarium', 'https://i.imgur.com/axL4qTN.jpg', 58.70, 'A spherical shape, providing an aesthetic and balanced display for small fish.', 160, 'Shaped'),
('Oval Aquarium', 'https://i.imgur.com/KSQj96t.jpg', 90.24, 'An oval-shaped design providing more surface area for aquatic life and plants.', 140, 'Shaped'),
('Flowerhorn Aquarium', 'https://i.imgur.com/THRgfYA.jpg', 98.32, 'Designed specifically for Flowerhorn fish, providing ample space for growth and display.', 2, 'Specialized'),
('Aquascape Aquarium', 'https://i.imgur.com/3Vk7UyK.png', 133.45, 'Built to create a natural aquatic environment with plants, rocks, and aquatic life.', 130, 'Specialized'),
('Arowana Aquarium', 'https://i.imgur.com/zSHnZdd.jpg', 264.57, 'Large and spacious, designed to accommodate the Arowana fish with plenty of swimming space.', 110, 'Specialized'),
('Wall-mounted Aquarium', 'https://i.imgur.com/Jv9QuGF.jpg', 24.69, 'Mounted on the wall, saving space while providing a stunning decorative feature.', 75, 'Mountable'),
('Desktop Aquarium', 'https://i.imgur.com/qCAZCpK.jpg', 300.35, 'Compact, suitable for desktops or small spaces, perfect for Betta or small fish.', 300, 'Desktop'),
('Cup-shaped Desktop Aquarium', 'https://i.imgur.com/YgNyLyZ.jpg', 129.48, 'A small, cup-shaped aquarium ideal for decorative purposes or small fish.', 220, 'Shaped'),
('USB Aquarium', 'https://i.imgur.com/7zeirc4.jpg', 2000.00, 'A miniature aquarium powered by USB, ideal for use as a desk accessory or novelty gift.', 350, 'Functional'),
('Bonded Glass Aquarium', 'https://i.imgur.com/4rMjMn5.jpg', 347.25, 'Assembled with multiple glass panels bonded together, offering a sturdy and leak-proof design.', 140, 'Glass'),
('Glass Cup Aquarium', 'https://i.imgur.com/BnZGuuL.jpg', 675.43, 'A small aquarium shaped like a cup, perfect for small fish or as a stylish decorative piece.', 190, 'Glass'),
('Wood-framed Aquarium', 'https://i.imgur.com/XpnjVEV.jpg', 2.76, 'Features a wooden frame for a rustic, natural look, ideal for home or office decor.', 5, 'Desktop');