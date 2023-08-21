-- SQL code for creating necessary tables and updating the database
CREATE TABLE IF NOT EXISTS stores (
    store_id INT AUTO_INCREMENT PRIMARY KEY,
    store_name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS admins (
    admin_id INT PRIMARY KEY,
    mobile_number BIGINT NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    mobile_number BIGINT NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS feedbacks (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    store_name VARCHAR(255) NOT NULL,
    feedback_text TEXT NOT NULL,
    selfie_path VARCHAR(255) NOT NULL,
    unit_number VARCHAR(255) NOT NULL,
    selfie_rating INT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
