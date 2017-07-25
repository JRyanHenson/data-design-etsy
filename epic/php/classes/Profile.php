<?php
/**
 * Etsy data design project class for profile
 * @author Ryan Henson <hensojr@gmail.com>
 * @version 1.0.0
 **/
class profile {
	/**
	 * id for this profile; this is the primary key
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 * activation toke for the profile
	 * @var string $profileActivationToken
	 **/
	private $profileActivationToken;
	/**
	 * handle associated with profile
	 * @var string $profileAtHandle
	 **/
	private $profileAtHandle;
	/**
	 * email address associated with profile
	 * @var string $profileEmail
	 **/
	private $profileEmail;
	/**
	 * password hash associated with profile
	 * @var string $profileHash
	 **/
	private $profileHash;
	/**
	 * phone number associated with profile
	 * @var string $profilePhone
	 **/
	private $profilePhone;
	/**
	 * salt used for password hash on associated profile
	 * @var string $profileSalt
	 **/
	private $profileSalt;
	/**
	 * constructor for this profile
	 *
	 * @param int|null $newProfileId of this profile or null if a new user
	 * @param string $newProfileActivationToken of the user profile
	 * @param string $newProfileAtHandle of the user profile
	 * @param string $newProfileEmail of the user profile
	 * @param string $newProfileHash of the user profile
	 * @param string $newProfilePhone of the user profile
	 * @param string $newProfileSalt of the user profile
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(?int $newProfileId, string $newProfileActivationToken, string $newProfileAtHandle, string $newProfileEmail, string $newProfileHash, string $newProfilePhone, string $newProfileSalt) {
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileActivationToken($newProfileActivationToken);
			$this->setProfileAtHandle($newProfileAtHandle);
			$this->setProfileEmail($newProfileEmail);
			$this->setProfileHash($newProfileHash);
			$this->setProfilePhone($newProfilePhone);
			$this->setProfileSalt($newProfileSalt);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for profileId
	 *
	 * @return int|null value of productId
	 **/
	public function getProfileId(): int {
		return ($this->profileId);
	}
	/**
	 * mutator method for profileId
	 *
	 * @param int|null $newProfileId new value of product id
	 * @throws \RangeException if $newProfileId is not positive
	 * @throws \TypeError if $newProfileId is not an integer
	 **/
	public function setProfileId(?int $newProfileId): void {
		//if product id is null immediately return it
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}
		// verify the  profileId is positive
		if($newProfileId <= 0) {
			throw(new \RangeException("profile id is not positive"));
		}
		// convert and store the profileId
		$this->profileId = $newProfileId;
	}
	/**
	 * accessor method for profileActivationToken
	 *
	 * @return string value of profileActivationToken
	 **/
	public function getProfileActivationToken(): string {
		return ($this->profileActivationToken);
	}
	/**
	* mutator method for profileActivationToken
	*
	* @param string $newProfileActivationToken new value of productDescription
	* @throws \InvalidArgumentException if $newProfileActivationToken is not a string or insecure
	* @throws \TypeError if $newProfileActivationToken is not a string
	**/
	public function setProfileActivationToken(string $newProfileActivationToken): void {
		// verify the profileActivationToken is secure
		$newProductDescription = trim($newProfileActivationToken);
		$newProductDescription = filter_var($newProfileActivationToken, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileActivationToken) === true) {
			throw(new \InvalidArgumentException("profile activation token is empty or insecure"));
		}
		// verify the profileActivationToken will fit in the database
		if(strlen($newProfileActivationToken) > 32) {
			throw(new \RangeException("profile activation token description content too large"));
		}
		// store the profileActivationToken
		$this->profileActivationToken= $newProfileActivationToken;
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