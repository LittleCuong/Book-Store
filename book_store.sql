use book_store;

create table users(
	user_ID varchar(10) primary key,
    user_name varchar(50) not null,
    user_pass varchar(100) not null,
    user_email varchar(50) not null,
    user_address varchar(100) not null
);

create table if not exists user_seq
(
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY
);

DELIMITER $$
CREATE TRIGGER user_insert
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
  INSERT INTO user_seq VALUES (NULL);
  SET NEW.user_ID = CONCAT('C', LPAD(LAST_INSERT_ID(), 1, 'C'));
END$$
DELIMITER ;

create table category(
	category_ID	int primary key auto_increment,
    category_name varchar(20) not null
);

create table book(
	book_ID	varchar(5) primary key DEFAULT '0',
    book_name varchar(255) not null,
    book_author	varchar(30) not null,
    book_price int not null,
    book_publisher varchar(50) not null,
    category_ID int,
    book_image varchar(255) not null,
    foreign key(category_ID) references category(category_ID)
);

create table if not exists book_seq
(
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY
);

DELIMITER $$
CREATE TRIGGER book_insert
BEFORE INSERT ON book
FOR EACH ROW
BEGIN
  INSERT INTO book_seq VALUES (NULL);
  SET NEW.book_ID = CONCAT('B', LPAD(LAST_INSERT_ID(), 4, '0'));
END$$
DELIMITER ;

create table invoice(
	invoice_ID int(10) auto_increment,
    user_ID varchar(10),
    delivery_address varchar(255),
    invoice_total int,
	create_at date,
    primary key(invoice_id),
    foreign key(user_ID) references users(user_ID) on delete cascade
);

create table invoice_detail(
	invoice_ID int(10),
    book_ID varchar(5),
    quantity int,
    foreign key(invoice_ID) references invoice(invoice_ID) on delete cascade,
    foreign key(book_ID) references book(book_ID) on delete cascade,
    primary key (invoice_ID, book_ID)
);

create table cart(
	user_ID varchar(10),
    book_ID varchar(5),
    quantity int,
    foreign key(user_ID) references USERS(user_ID) on delete cascade,
    foreign key(book_ID) references book(book_ID) on delete cascade,
    primary key (user_ID, book_ID)
);

-- Insert users


insert into users values ('', 'Nguyen  Phu Cuong', 'cuong123', 'cuong@gmail.com', 'Everywhere');
insert into users values ('', 'Nguyen Phu Cuong', 'cuong123', 'cuong@gmail.com', 'Can Tho');

-- Insert category
insert into category values ( 1, 'Manga'); 
insert into category values ( 2, 'Tiểu thuyết'); 
insert into category values ( 3, 'Khoa học'); 
insert into category values ( 4, 'Lập trình'); 

-- Insert books
insert into book values ('', 'Naruto tập 1: Uzumaki Naruto (Tái Bản 2022)', 'Masashi Kishimoto', 22500, 'NXB Kim Đồng', 1, '../assets/img/naruto.jpg');
insert into book values ('', 'Naruto tập 2: Vị Khách Khó Ưa (Tái Bản 2022)', 'Masashi Kishimoto', 22500, 'NXB Kim Đồng', 1, '../assets/img/naruto.jpg');
insert into book values ('', 'Naruto tập 3: Trận Chiến Sống Còn!! (Tái Bản 2022)', 'Masashi Kishimoto', 22500, 'NXB Kim Đồng', 1, '../assets/img/naruto.jpg');
insert into book values ('', 'Naruto tập 4: Cây Cầu Mang Tên Người Anh Hùng!! (Tái Bản 2022)', 'Masashi Kishimoto', 22500, 'NXB Kim Đồng', 1, '../assets/img/naruto.jpg');
insert into book values ('', 'Naruto tập 5: Đấu Thủ!! (Tái Bản 2022)', 'Masashi Kishimoto', 22500, 'NXB Kim Đồng', 1, '../assets/img/naruto.jpg');
insert into book values ('', 'One Piece tập 1: Romance Dawn - Bình Minh Của Cuộc Phiêu Lưu (Tái Bản 2022)', 'Oda EiiChiro', 22500, 'NXB Kim Đồng', 1, '../assets/img/one-piece.jpg');
insert into book values ('', 'One Piece tập 2: Versus!! Binh Đoàn Hải Tặc Buggy (Tái Bản 2022)', 'Oda EiiChiro', 22500, 'NXB Kim Đồng', 1, '../assets/img/one-piece.jpg');
insert into book values ('', 'One Piece tập 3: Thứ Không Thể Nói Dối (Tái Bản 2022)', 'Oda EiiChiro', 22500, 'NXB Kim Đồng', 1, '../assets/img/one-piece.jpg');
insert into book values ('', 'One Piece tập 4: Trăng Lưỡi Liềm (Tái Bản 2022)', 'Oda EiiChiro', 22500, 'NXB Kim Đồng', 1, '../assets/img/one-piece.jpg');
insert into book values ('', 'One Piece tập 5: Chuông Nguyện Vì Ai? (Tái Bản 2022)', 'Oda EiiChiro', 22500, 'NXB Kim Đồng', 1, '../assets/img/one-piece.jpg');
insert into book values ('', 'One Piece tập 6: Lời Thề (Tái Bản 2022)', 'Oda EiiChiro', 22500, 'NXB Kim Đồng', 1, '../assets/img/one-piece.jpg');
insert into book values ('', 'The World and All That It Holds', 'Aleksandar Hemon', 352040, 'Order from Amazon', 2, '../assets/img/theworld.jpg');
insert into book values ('', 'Now I Am Here', 'Chidi Ebere', 399010, 'Order from Amazon', 2, '../assets/img/nowiamhere.jpg');
insert into book values ('', 'Under A Wartime Sky', 'Liz Trenow', 211130, 'Order from Amazon', 2, '../assets/img/underwartime.jpg');
insert into book values ('', '101 Cách Ném Smoke Cơ Bản', 'Unknown', 70000, 'NXB VN:CSGO', 3, '../assets/img/smoke.jpg');
insert into book values ('', 'Lịch Sử Và Tương Lai Của Nhân Loại', 'Siddhartha Mukherjee', 255500, 'NXB Dân Trí', 3, '../assets/img/lichsuvatuonglai.jpg');
insert into book values ('', 'Bách Khoa Thư Các Khám Phá Thay Đổi Thế Giới', 'DK', 465000, 'NXB Dân Trí', 3, '../assets/img/backkhoathu.jpg');
insert into book values ('', 'Tri Thức Về Vạn Vật – Một Thế Giới Trực Quan Chưa Từng Thấy', 'DK', 599000, 'NXB Dân Trí', 3, '../assets/img/trithuc.jpg');
insert into book values ('', 'Những Nhà Khám Phá – Lịch Sử Tri Kiến Vạn Vật Và Con Người', 'Daniel J. Boorstin', 167000, 'NXB Thế Giới', 3, '../assets/img/creator.jpg');
insert into book values ('', 'Homo Deus: Lược Sử Tương Lai', 'Yuval Noah Harari', 160650, 'NXB Thế Giới', 3, '../assets/img/homo.jpg');
insert into book values ('', 'Bộ Sách Nhân Tố Enzyme', 'Hiromi Shinya', 323650, 'NXB Thế Giới', 3, '../assets/img/enzyme.jpg');

-- Procedure
DELIMITER $$
create procedure buy_product(p_user_ID varchar(10), p_book_ID varchar(5), p_amount int)
begin
    declare delivery_address varchar(100) default "";
    declare price int;
    declare total int;
    
    select book_price into price from book where book_ID = p_book_ID;
    set total = price*p_amount;
	select user_address into delivery_address from users where user_ID = p_user_ID;
    call create_invoice(p_book_ID, p_user_ID, delivery_address, total, p_amount); 
end$$
DELIMITER ;

DELIMITER $$
create procedure create_invoice(p_book_ID varchar(5), p_user_ID varchar(10), p_address varchar(100), p_total int, p_amount int)
begin
	declare latest_ID int;
    
    insert into invoice(user_id, delivery_address, invoice_total, create_at) values (p_user_ID, p_address, p_total, curdate());
	select max(invoice_ID) into latest_ID from invoice;
    insert into invoice_detail values (latest_ID, p_book_ID, p_amount);
end$$
DELIMITER ;

-- Test 

-- Drop 
drop procedure buy_product; 
drop procedure create_invoice;




