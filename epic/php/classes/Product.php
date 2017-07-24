<?php
/**
 * Etsy data design project
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
		// verify the profileId is positive
		if($newProductUserId <= 0) {
			throw(new \RangeException("product user id is not positive"));
		}
		// convert and store the productProfileId
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
		// verify the tweet content will fit in the database
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

}