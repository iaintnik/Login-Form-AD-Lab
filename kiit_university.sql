-- Create the database
CREATE DATABASE IF NOT EXISTS `kiit_university`;
USE `kiit_university`;

-- Create the `users` table for admin login
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL
);

-- Insert a default admin user (username: admin, password: admin123)
-- Password is hashed using PHP's password_hash() function
INSERT INTO `users` (`username`, `password`) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'); -- Password: admin123

-- Create the `students` table for student records
CREATE TABLE IF NOT EXISTS `students` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `age` INT NOT NULL,
    `section` VARCHAR(50) NOT NULL,
    `roll_number` VARCHAR(50) NOT NULL UNIQUE,
    `dob` DATE NOT NULL,
    `gender` ENUM('Male', 'Female', 'Other') NOT NULL
);

-- Insert sample student data
INSERT INTO `students` (`name`, `age`, `section`, `roll_number`, `dob`, `gender`) VALUES
('John Doe', 20, 'A', '101', '2003-05-15', 'Male'),
('Jane Smith', 21, 'B', '102', '2002-08-22', 'Female'),
('Alice Johnson', 19, 'C', '103', '2004-02-10', 'Other');