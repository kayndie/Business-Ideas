CREATE TABLE Barista (
    barista_id INT PRIMARY KEY AUTO_INCREMENT,
    barista_name VARCHAR(50) NOT NULL,
    experience_level VARCHAR(20),
    contact_number VARCHAR(15)
);

CREATE TABLE Product (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(50) NOT NULL,
    price DECIMAL(5,2) NOT NULL,
    barista_id INT,
    FOREIGN KEY (barista_id) REFERENCES Barista(barista_id)
);
