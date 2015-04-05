CREATE TABLE student (
name VARCHAR(32) NOT NULL,
email VARCHAR(256) NOT NULL,
point INT,
password VARCHAR(50) NOT NULL,
matric CHAR(9) PRIMARY KEY,
resetComplete VARCHAR(3),
resetToken VARCHAR(50),
faculty VARCHAR(20) REFERENCES faculty(faculty_name)
);

CREATE TABLE module (
start_time TIME,
end_time TIME,
weekday VARCHAR(10),
module_code VARCHAR(10),
slotID INT,
PRIMARY KEY (module_code, slotID)
);

CREATE TABLE faculty (
faculty_name VARCHAR(20) PRIMARY KEY
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
faculty_name VARCHAR(20) REFERENCES faculty(faculty_name),
module_code VARCHAR(10),
slotID INT,
quota INT,
FOREIGN KEY (module_code, slotID) REFERENCES module(module_code, slotID)
);