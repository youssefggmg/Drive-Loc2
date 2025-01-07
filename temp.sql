create database Drive_Loc2;

use Drive_Loc2;

create table
    role (
        id int primary key auto_increment,
        name varchar(20)
    );

insert into
    role (name)
values
    ("admine"),
    ("user");

create table
    place (
        id int primary key auto_increment,
        placeName varchar(50) not null
    );

create table
    catigory (
        catigorYid int primary key auto_increment,
        catigoryName varchar(255) not null
    );

create table
    user (
        userID int primary key auto_increment,
        user_name varchar(50) not null,
        user_email varchar(50) not null,
        password varchar(255) not null,
        role int,
        constraint FK_role foreign key (role) references role (id) on delete cascade on update cascade
    );

CREATE TABLE
    vehicles (
        vehiclesID INT PRIMARY KEY AUTO_INCREMENT,
        vehiclesName VARCHAR(255) NOT NULL,
        vehiclesColor VARCHAR(255) NOT NULL,
        vehiclestype VARCHAR(255) NOT NULL,
        rent INT NOT NULL,
        vehiculImage TEXT NOT NULL,
        catigorYid INT,
        CONSTRAINT FK_catigory_ID FOREIGN KEY (catigorYid) REFERENCES catigory (catigorYid) ON DELETE CASCADE ON UPDATE CASCADE
    );

create table
    rate (
        rateID int primary key auto_increment,
        rate int not null,
        userID int,
        vehiculeID int,
        constraint FK_user_ID foreign key (userID) references user (userID) on delete cascade on update cascade,
        constraint FK_vehicule_ID foreign key (vehiculeID) references vehicles (vehiclesID) on delete cascade on update cascade
    );

create table
    reservation (
        reservationID int primary key auto_increment,
        startdate date not null,
        endDate date not null,
        status ENUM ('pending', 'accepted', 'rejected') NOT NULL DEFAULT 'pending',
        placeID int,
        vehiculID int,
        userID int,
        constraint FK_place_ID foreign key (placeID) references place (id) on update cascade on delete cascade,
        constraint FK_vehiculID foreign key (vehiculID) references vehicles (vehiclesID) on update cascade on delete cascade,
        constraint FKUserID foreign key (UserID) references user (userID) on update cascade on delete cascade
    );

create table
    theme (
        themeID int primary key auto_increment,
        themeName varchar(255) not null,
        themeImage text not null
    );

create table
    blog (
        blogid int primary key auto_increment,
        title varchar(255) not null,
        content text not null,
        creationdate date default now (),
        image text not null,
        isapproved enum ("approved", "notApproved") default "notApproved",
        authorID int,
        constraint FK_author_ID foreign key (authorID) references user (userID) on update cascade on delete cascade
    );

create table
    comment (
        commentID int primary key auto_increment,
        centext text not null,
        userID int,
        blogID int,
        constraint FKUSER_ID foreign key (userID) references user (userID) on update cascade on delete cascade,
        constraint FKBLOGID foreign key (blogID) references blog (blogid) on update cascade on delete cascade
    );

create table
    tag (
        tagid int primary key auto_increment,
        tagName varchar(255) not null
    );

create table
    tagBlog (
        id int primary key auto_increment,
        blog int,
        tag int,
        constraint FK_BLOG_ID foreign key (blog) references blog (blogid) on update cascade on delete cascade,
        constraint FKTAGID foreign key (tag) references tag (tagid) on update cascade on delete cascade
    )
    -- drop database drive_loc2;
    -- select * from role;
    -- select * from catigory;
    -- SELECT * FROM catigory;
    -- SELECT 
    --                     v.vehiclesID, 
    --                     v.vehiclesName, 
    --                     v.vehiclesColor, 
    --                     v.vehiclestype, 
    --                     v.rent, 
    --                     v.vehiculImage, 
    --                     v.catigorYid, 
    --                     r.reservationID, 
    --                     r.startdate, 
    --                     r.endDate, 
    --                     r.status AS reservation_status, 
    --                     r.placeID, 
    --                     r.userID
    --                   FROM vehicles v, reservation r
    --                   WHERE v.vehiclesID = r.vehiculID
    --                   AND r.userID = 2;