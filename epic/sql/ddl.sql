-- drop tables to start over from scratch
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS profile;
DROP TABLE IF EXISTS product;
-- the CREATE profile entity
CREATE TABLE profile (
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileActivationToken CHAR(32),
	profileAtHandle VARCHAR(32) NOT NULL,
	-- to make sure duplicate data cannot exist, create a unique index
	profileEmail VARCHAR(128) NOT NULL,
	profileHash	CHAR(128) NOT NULL,
	-- to make something optional, exclude the not null
	profilePhone VARCHAR(32),
	profileSalt CHAR(64) NOT NULL,
	UNIQUE(profileEmail),
	UNIQUE(profileAtHandle),
	-- this officiates the primary key for the entity
	PRIMARY KEY(profileId)
);
-- create the product entity
CREATE TABLE product (
	-- productId is the primary key
	productId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	-- this is for a foreign key; auto_incremented is omitted by design
	productUserId INT UNSIGNED NOT NULL,
	productDescription VARCHAR(140) NOT NULL,
	productPrice DECIMAL(10,2) NOT NULL,
	-- this creates an index before making a foreign key
	INDEX(productUserId),
	-- this creates the actual foreign key relation
	FOREIGN KEY(productUserId) REFERENCES profile(profileId),
	-- and finally create the primary key
	PRIMARY KEY(productId)
);
SET FOREIGN_KEY_CHECKS=1;
