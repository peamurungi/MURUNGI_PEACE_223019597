-- Database: project2_db
CREATE DATABASE IF NOT EXISTS project2_db;
USE project2_db;

-- Table structure for students
CREATE TABLE IF NOT EXISTS students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  day VARCHAR(5),
  month VARCHAR(15),
  year VARCHAR(6),
  email VARCHAR(100),
  mobile VARCHAR(20),
  gender VARCHAR(10),
  address TEXT,
  city VARCHAR(50),
  pincode VARCHAR(20),
  state VARCHAR(50),
  country VARCHAR(50),
  hobby TEXT,
  exam1_board VARCHAR(20),
  exam1_percentage VARCHAR(10),
  exam1_year VARCHAR(10),
  exam2_board VARCHAR(20),
  exam2_percentage VARCHAR(10),
  exam2_year VARCHAR(10),
  exam3_board VARCHAR(20),
  exam3_percentage VARCHAR(10),
  exam3_year VARCHAR(10),
  exam4_board VARCHAR(20),
  exam4_percentage VARCHAR(10),
  exam4_year VARCHAR(10),
  course VARCHAR(20)
);
