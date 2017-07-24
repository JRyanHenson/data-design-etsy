-- Insert: create a row
	INSERT INTO profile(profileActivationToken, profileAtHandle, profileEmail, profileHash, profilePhone, profileSalt)
	VALUES(0, "@ryebread", "hensojr@gmail.com", 0, "555-5555", 0);

	INSERT INTO profile(profileActivationToken, profileAtHandle, profileEmail, profileHash, profilePhone, profileSalt)
	VALUES(0, "@mikey", "smike@gmail.com", 0, "555-5556", 0);

	INSERT INTO profile(profileActivationToken, profileAtHandle, profileEmail, profileHash, profilePhone, profileSalt)
	VALUES(0, "@jimbo", "jimbo@gmail.com", 0, "555-5557", 0);

	INSERT INTO product(productUserId, productDescription, productPrice)
	VALUES(1,"bike", 100.00);

	INSERT INTO product(productUserId, productDescription, productPrice)
	VALUES(2,"painting", 200.00);

	INSERT INTO product(productUserId, productDescription, productPrice)
	VALUES(3,"board game", 40.00);

-- Update: change a row
	UPDATE profile SET profileAtHandle = "@marbleryebread" WHERE profileIde = 1;

-- Where Clause
-- numerics
	SELECT profileAtHandle FROM profile WHERE profileId = 1;-- select by equality
	SELECT profileAtHandle FROM profile WHERE profileId < 3; -- select by inequality; <, > !=, <=, >=

-- strings
	SELECT productPrice FROM product WHERE productDescription = “bike”; -- select by string equality
	SELECT productPrice From product WHERE productDescription = “%game%”; --select by starting with
	SELECT productPrice From product WHERE productDescription LIKE "p%"; -- select by starting with
	SELECT productPrice From product WHERE productDescription LIKE "%e"; -- select by ending with

-- expressions
	WHERE SUM(price * quantity) > 100
	SELECT productPrice FROM product WHERE SUM(productPrice + 0) < 100 GROUP BY;

-- AND/OR
	SELECT profileAtHandle FROM profile WHERE profileId = 1 AND LENGTH(profilePhone) > 2;
	SELECT profileATHandle FROM profile WHERE profileId = 1 OR profilePhone LIKE "555-5555";

-- Update
	UPDATE profile SET profileAtHandle = "@marbleryebread" WHERE profileIde = 1;

-- Delete: get rid of a row
	DELETE profileEmail FROM profile WHERE profileId = 1;

-- Select: get row(s)
	SELECT profileId, profileEmail FROM profile WHERE profileAtHandle = "@marbleryebread";
