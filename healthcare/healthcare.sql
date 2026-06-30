CREATE DATABASE healthcare;

USE healthcare;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100) UNIQUE,
password VARCHAR(255),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE predictions(
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
symptoms TEXT,
disease VARCHAR(100),
medicine TEXT,
prediction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reports(
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
file_name VARCHAR(255),
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE doctors(
id INT AUTO_INCREMENT PRIMARY KEY,
specialization VARCHAR(100),
doctor_name VARCHAR(100),
experience VARCHAR(50),
hospital VARCHAR(100)
);

INSERT INTO doctors(specialization,doctor_name,experience,hospital)
VALUES
('General Physician','Dr. Amit Verma','10 Years','City Hospital'),
('Cardiologist','Dr. Neha Singh','12 Years','Heart Care Center'),
('Dermatologist','Dr. Pooja Mehta','8 Years','Skin Care Clinic'),
('Neurologist','Dr. Rakesh Jain','15 Years','Neuro Care Center');

CREATE TABLE admin(
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),
password VARCHAR(255)
);

INSERT INTO admin(username,password)
VALUES('admin','admin123');