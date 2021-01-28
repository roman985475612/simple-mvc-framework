CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at DATETIME default CURRENT_TIME
)
ENGINE=InnoDB;

CREATE TABLE posts (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    body text,
    created_at DATETIME default CURRENT_TIME
)
ENGINE=InnoDB;