/*
DROP TABLE has_quota;
DROP TABLE bid;
DROP TABLE take;
DROP TABLE module;
DROP TABLE faculty;
DROP TABLE student;
*/
CREATE TABLE student (
	name VARCHAR(32) NOT NULL,
	email VARCHAR(256) NOT NULL,
	point INT,
	password VARCHAR(50) NOT NULL,
	matric CHAR(9) PRIMARY KEY,
	resetComplete VARCHAR(3),
	resetToken VARCHAR(50),
	faculty VARCHAR(30) REFERENCES faculty(faculty_name)
);

CREATE TABLE module (
	start_time TIME,
	end_time TIME,
	weekday VARCHAR(10),
	module_code VARCHAR(10),
	slotID INT,
	name VARCHAR(64),
	PRIMARY KEY (module_code, slotID)
);

CREATE TABLE faculty (
	faculty_name VARCHAR(30) PRIMARY KEY
);

CREATE TABLE take (
	matric CHAR(9) REFERENCES student(matric),
	module_code VARCHAR(10),
	slotID INT,
	FOREIGN KEY (module_code, slotID) REFERENCES module(module_code, slotID)
);

CREATE TABLE bid (
	matric CHAR(9) REFERENCES student(matric),
	module_code VARCHAR(10),
	slotID INT,
	bidPoint INT,
	FOREIGN KEY (module_code, slotID) REFERENCES module(module_code, slotID)
);

CREATE TABLE has_quota (
	faculty_name VARCHAR(30) REFERENCES faculty(faculty_name),
	module_code VARCHAR(10),
	slotID INT,
	quota INT,
	FOREIGN KEY (module_code, slotID) REFERENCES module(module_code, slotID)
);



insert into module values ('10:00:00','12:00:00','Monday','EG2401',1, 'Engineering Professionalism');
insert into module values ('12:00:00','14:00:00','Thursday','EG2401',2, 'Engineering Professionalism');
insert into module values ('8:00:00','10:00:00','Tuesday','CS2102',1, 'Database Systems');
insert into module values ('12:00:00','14:00:00','Thursday','CS2105',1, 'Introduction to Computer Network');


insert into student values ('XIE XIN', 'xiexin2011@gmail.com', 100, '123465', 'U0135137L', NULL, NULL, 'Engineering');
insert into student values ('HUANG RAN', 'huangran1991@yahoo.com', 100, 'dfasc56', 'A0145138L', NULL, NULL, 'Science');
insert into student values ('GOH ENG CHYE', 'gohengchye1992@msn.com', 100, 'abcdefdfd', 'A0156156L', NULL,NULL, 'Science');
insert into student values ('TAY WEI GUO', 'tayweiguo1989@msn.com', 100, 'afkldx33', 'A5648656I', NULL,NULL, 'Medicine');
insert into student values ('ONG KAH HONG', 'ongkahhong1991@gmail.com', 100, 'adxdf65x', 'A7885654K', NULL,NULL, 'Design and Environment');
insert into student values ('PENG JIAYUAN', 'pengjiayuan2011@hotmail.com', 100, 'sfefx56', 'A7895156I', NULL,NULL, 'Music');
insert into student values ('HUANG ZHANPENG', 'huangzhanpeng1992@msn.com', 100, 'Adfxesx', 'A7892457M', NULL,NULL, 'Law');
insert into student values ('NGOO GEK PING', 'ngoogekping1990@hotmail.com', 100, 'd456cxd', 'A0135789O', NULL, NULL, 'Engineering');
insert into student values ('GE YUWEI', 'geyuwei1992@hotmail.com', 100, 'Fdsfex3qw', 'A0465789P', NULL, NULL, 'Arts and Social Sciences');
insert into student values ('ZHENG ZHEMIN', 'zhengzhemin1991@yahoo.com', 100, 'sfx854x', 'A2568789I', NULL, NULL, 'Science');
insert into student values ('LIU ZHANPENG', 'liuzhanpeng2011@msn.com', 100, 'dDscsd4D', 'A0123546Y', NULL, NULL, 'Engineering');


insert into faculty values ('Engineering');
insert into faculty values ('Arts and Social Sciences');
insert into faculty values ('Business');
insert into faculty values ('Computing');
insert into faculty values ('Dentistry');
insert into faculty values ('Design and Environment');
insert into faculty values ('Law');
insert into faculty values ('Medicine');
insert into faculty values ('Music');
insert into faculty values ('Science');


insert into bid values ('A0145138L','EG2401',1,15);
insert into bid values ('A0465789P','EG2401',1,18);
insert into bid values ('U0135137L','CS2102',1,20);
insert into bid values ('A0123546Y','PC1432',1,140);
insert into bid values ('A0123546Y','ME2334',1,24);
insert into bid values ('A0123546Y','MA1506',1,47);
insert into bid values ('A0123546Y','CS2102',1,20);
insert into bid values ('A0123546Y','EG2401',1,90);
insert into bid values ('A0145138L','PC1432',1,140);
insert into bid values ('A0145138L','ME2334',1,24);
insert into bid values ('A0145138L','MA1506',1,47);
insert into bid values ('A0145138L','CS2102',1,20);
insert into bid values ('A0145138L','EG2401',1,100);

insert into has_quota values ('Science','EG2401',1,20);
insert into has_quota values ('Engineering','EG2401',1,200);
insert into has_quota values ('Computing','CS2102',1,150);

insert into take values ('U0135137L','EG2401',1);
insert into take values ('A0156156L','CS2102',1);
insert into take values ('A0156156L','EG2401',2);
insert into take values ('A0156156L','CS2105',1);

