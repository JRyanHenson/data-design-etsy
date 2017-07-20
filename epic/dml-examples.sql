-- Insert: create a row
	INSERT INTO tweet(tweetProfileId, tweetContent, tweetDateTime)
	VALUES(39, @comcast is too expensive”, NOW();

-- Update: change a row
	UPDATE entity SET attribute0 = value0, attribute1 = value1, ..., attributek = valuek
	WHERE ???

-- Where Clause
-- numerics
	WHERE tweetId = 42 —select by equality
	WHERE tweetId > 42 — select by inequality; <, > !=, <=, >=

-- strings
	WHERE tweetContent = “exact content” — select by string equality
	WHERE tweetContent = “%contains%” — select by starting with
	WHERE tweetContent LIKE "starts%" -- select by starting with
	WHERE tweetContent LIKE "ends%" -- select by ending with

-- expressions
	WHERE SUM(price * quantity) > 100
	WHERE LENGTH(tweetContent) > 90hel

-- AND/OR
	WHERE tweetProfileId = 39 AND LENGTH(tweetContent) > 90
	WHERE tweetProfileId = 39 OR tweetContent LIKE "#comcastdoesntcare"

-- Update
	UPDATE entity SET attribute0 = value0, attribute1 = value1, ..., attributek = valuek
	WHERE ???

	UPDATE tweet SET tweetProfileId = 39, tweetContent = "my tweets are just getting better #sassy", tweetDateTime = NOW()
	WHERE tweetId = 42;

-- Delete: get rid of a row
	DELETE FROM entity
	WHERE ???
	DELETE FROM tweet WHERE tweetId = 42

-- Select: get row(s)
	SELECT attribute0, attribute1, …, attributes
	FROM entity
	WHERE ???

	SELECT tweeId, tweetProfileId, tweetContent, tweetDateTime
	FROM tweet
	WHERE tweetProfileId = 42; —select by primary key

	SELECT tweetId, tweetProfileId, tweetContent, tweetDateTime
	FROM tweet
	WHERE tweetProfileId = 39; — select by foreign key

	SELECT tweetId, tweetProfileId, tweetContent, tweetDateTime
	FROM tweet
	WHERE tweetContent LIKE “%comcastdoesntcare%”; — select by string