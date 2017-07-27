<?php
/**
 * Etsy data design project product class
 * @author Ryan Henson <hensojr@gmail.com>
 * @version 1.0.0
 **/
class product {
	/**
	 * id for this product; this is the primary key
	 * @var int $productId
	 **/
	private $productId;
	/**
	 * id of the Profile that owns this product; this is a foreign key
	 * @var int $productUserId
	 **/
	private $productUserId;
	/**
	 * actual textual content of this product
	 * @var string $productDescription
	 **/
	private $productDescription;
	/**
	 * price of the product
	 * @var int $productPrice
	 **/
	private $productPrice;
	/**
	 * constructor for this product
	 *
	 * @param int|null $newProductId of this product or null if a new product
	 * @param int $newProductUserId of the user profile that owns this product
	 * @param string $newProductDescription string containing actual product data
	 * @param float $newProductPrice containing actual product price
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(?int $newProductId, int $newProductUserId, string $newProductDescription, float $newProductPrice) {
		try {
			$this->setProductId($newProductId);
			$this->setProductUserId($newProductUserId);
			$this->setProductDescription($newProductDescription);
			$this->setProductPrice($newProductPrice);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for productId
	 *
	 * @return int|null value of productId
	 **/
	public function getProductId(): int {
		return ($this->productId);
	}
	/**
	 * mutator method for product id
	 *
	 * @param int|null $newProductId new value of product id
	 * @throws \RangeException if $newProductId is not positive
	 * @throws \TypeError if $newProductId is not an integer
	 **/
	public function setProductId(?int $newProductId): void {
		//if product id is null immediately return it
		if($newProductId === null) {
			$this->productId = null;
			return;
		}
		// verify the  productId is positive
		if($newProductId <= 0) {
			throw(new \RangeException("product id is not positive"));
		}
		// convert and store the productId
		$this->productId = $newProductId;
	}
	/**
	 * accessor method for productUserId
	 *
	 * @return int value of productUserId
	 **/
	public function getProductUserId(): int {
		return ($this->productUserId);
	}
	/**
	 * mutator method for productUserId
	 *
	 * @param int $newProductUserId new value of productUserId
	 * @throws \RangeException if $newProductUserId is not positive
	 * @throws \TypeError if $newProductUserId is not an integer
	 **/
	public function setProductUserId(int $newProductUserId): void {
		// verify the productId is positive
		if($newProductUserId <= 0) {
			throw(new \RangeException("product user id is not positive"));
		}
		// convert and store the productProductId
		$this->productUserId = $newProductUserId;
	}
	/**
	 * accessor method for productDescription
	 *
	 * @return string value of productDescription
	 **/
	public function getProductDescription(): string {
		return ($this->productDescription);
	}
	/**
	 * mutator method for productDescription
	 *
	 * @param string $newProductDescription new value of productDescription
	 * @throws \InvalidArgumentException if $newProductDescription is not a string or insecure
	 * @throws \TypeError if $newProductDescription is not a string
	 **/
	public function setProductDescription(string $newProductDescription): void {
		// verify the productDescription is secure
		$newProductDescription = trim($newProductDescription);
		$newProductDescription = filter_var($newProductDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProductDescription) === true) {
			throw(new \InvalidArgumentException("product description is empty or insecure"));
		}
		// verify the productDescription will fit in the database
		if(strlen($newProductDescription) > 140) {
			throw(new \RangeException("product description content too large"));
		}
		// store the productDescription
		$this->productDescription = $newProductDescription;
	}
	/**
	 * accessor method for productPrice
	 *
	 * @return float value of productPrice
	 **/
	public function getProductPrice(): float {
		return ($this->productPrice);
	}
	/**
	 * mutator method for productPrice
	 *
	 * @param float $newProductPrice new value of productPrice
	 * @throws \RangeException if $newProductPrice is not positive
	 * @throws \TypeError if $newProductPrice is not an integer
	 **/
	public function setProductPrice(float $newProductPrice): void {
		// verify the productPrice is positive
		if($newProductPrice <= 0) {
			throw(new \RangeException("product price is not positive"));
		}
		// convert and store the productProfileId
		$this->productPrice = $newProductPrice;
	}
	/**
	 * inserts this product into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) : void {
		// enforce the productId is null (i.e., don't insert a product that already exists)
		if($this->productId !== null) {
			throw(new \PDOException("not a new product"));
		}
		// create query template
		$query = "INSERT INTO product(productUserId, productDescription, productPrice) VALUES(:productUserId, :productDescription, :productPrice)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["productUserId" => $this->productUserId, "productDescription" => $this->productDescription, "productPrice" => $this->productPrice];
		$statement->execute($parameters);

		// update the null productId with what mySQL just gave us
		$this->productId = intval($pdo->lastInsertId());
	}
	/**
	 * deletes this product from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) : void {
		// enforce the productId is not null (i.e., don't delete a product that hasn't been inserted)
		if($this->productId === null) {
			throw(new \PDOException("unable to delete a product that does not exist"));
		}
		// create query template
		$query = "DELETE FROM product WHERE productId = :productId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["productId" => $this->productId];
		$statement->execute($parameters);
	}
	/**
	 * updates this product in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) : void {
		// enforce the productId is not null (i.e., don't update a product that hasn't been inserted)
		if($this->productId === null) {
			throw(new \PDOException("unable to update a product that does not exist"));
		}
		// create query template
		$query = "UPDATE product SET productUserId = :productUserId, productDescription = :productDescription, productPrice = :productPrice";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["productUserId" => $this->productUserId, "productDescription" => $this->productDescription, "productPrice" => $this->productPrice];
		$statement->execute($parameters);
	}
	/**
	 * gets the Product by productId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $productId product id to search for
	 * @return Product|null Product found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getProductByProductId(\PDO $pdo, int $productId) : ?Product {
		// sanitize the productId before searching
		if($productId <= 0) {
			throw(new \PDOException("product id is not positive"));
		}
		// create query template
		$query = "SELECT productId, productUserId, productDescription, productPrice FROM product WHERE productId = :productId";
		$statement = $pdo->prepare($query);

		// bind the product id to the place holder in the template
		$parameters = ["productId" => $productId];
		$statement->execute($parameters);

		// grab the product from mySQL
		try {
			$product= null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$product = new Product($row["productId"], $row["productUserId"], $row["productDescription"], $row["productPrice"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($product);
	}
}