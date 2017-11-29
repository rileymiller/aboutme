DROP TABLE IF EXISTS ORDERS CASCADE;
SET FOREIGN_KEY_CHECKS=0;
CREATE TABLE ORDERS
(
	order_id INT AUTO_INCREMENT,
	order_time VARCHAR(255) NOT NULL,
	product_id INT,
	customer_id INT,
	quantity INT NOT NULL,
	tax FLOAT(8) NOT NULL,
	donation FLOAT(8) NOT NULL,
	total_cost FLOAT(8) NOT NULL,
	PRIMARY KEY (order_id),
	FOREIGN KEY (product_id) REFERENCES PRODUCT(id) ON DELETE CASCADE,
	FOREIGN KEY (customer_id) REFERENCES CUSTOMER(id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS CUSTOMER;
CREATE TABLE CUSTOMER
(
	id INT AUTO_INCREMENT,
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS PRODUCT;
CREATE TABLE PRODUCT
(
	id INT AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	value VARCHAR(255) NOT NULL,
	price FLOAT(8) NOT NULL,
	quantity INT NOT NULL,
	image VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO PRODUCT(name,value, price,quantity,image)
VALUES ('iPhone', 'iphone', 1000,25,'iphone.png');
INSERT INTO PRODUCT(name,value, price,quantity,image)
VALUES ('Samsung Galaxy', 'galaxy', 900,25,'galaxy.png');
INSERT INTO PRODUCT(name,value, price,quantity,image)
VALUES ('Google Pixel', 'pixel', 800,25,'pixel.png');
INSERT INTO PRODUCT(name,value, price,quantity,image)
VALUES ('Motorola Razr', 'razr', 250,25,'razr.png');
INSERT INTO PRODUCT(name,value, price,quantity,image)
VALUES ('Blackberry', 'blackberry', 400,25,'blackberry.png');
INSERT INTO PRODUCT(name,value, price,quantity,image)
VALUES ('T-Mobile Sidekick', 'sidekick', 399,25,'sidekick.png');




