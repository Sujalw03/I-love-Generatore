

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert a test admin user (password is 'admin123' encrypted)
INSERT INTO admin (username, password) VALUES ('admin', MD5('admin123'));
