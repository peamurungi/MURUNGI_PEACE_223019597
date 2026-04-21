-- Drop existing tables if they exist
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS contacts;

-- Users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Insert default admin
INSERT INTO users (username, password) VALUES ('admin', 'admin123');

-- Orders table
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(100),
  item VARCHAR(100),
  quantity INT,
  order_date DATE
);

-- Sample order
INSERT INTO orders (customer_name, item, quantity, order_date)
VALUES ('John Doe', 'Fish', 2, '2026-04-21');

-- Contacts table
CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  message TEXT,
  contact_date DATE
);

-- Sample contact
INSERT INTO contacts (name, email, message, contact_date)
VALUES ('Jane Smith', 'jane@example.com', 'I love your hotel!', '2026-04-21');
