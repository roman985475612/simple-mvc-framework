CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at timestamp NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`)
)
ENGINE=InnoDB;

CREATE TABLE posts (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255),
    body TEXT,
    created_at timestamp NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    FOREIGN KEY (user_id) REFERENCES users(id)
)
ENGINE=InnoDB;