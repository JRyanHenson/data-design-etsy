<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crapsy Data Design</title>
	</head>
	<body>
		<h2>Persona</h2>
		<p><strong>Name:</strong> Sally Seller</p>
		<p><strong>Age:</strong> 32</p>
		<p><strong>Technology:</strong> Windows moderate user. Sally uses Dell Inspiron 3000 series, and an iPhone 6 with a limited data plan. </p>
		<p><strong>Attitudes and Behaviors:</strong> Sally is intelligent, creative, and meticulous but not a power computer user. She learns quickly although can be overwhelmed when tasks become too technical. She has a full-time job and one child, so her free time is limited</p>
		<p><strong>Frustrations and Needs:</strong> While by day Sally is a Geologist with the U.S. Geological Survey, her true passion is making Elvis Presley paper mache dolls. She needs a user friendly site where she can easily sell her art. Sally is a good fit for Crapsy because she needs an easy to use platform for displaying and selling her art.</p>
		<p><strong>Goals:</strong> Sally's goal is to be a full time artisan and eventually move from paper mache Elvis Presley dolls to paintings of Marilyn Monroe on velvet backgrounds. She will need a compatible website to accomplish this goal.</p>
		<p><strong>User Story:</strong> As a user, Sally needs to easily set up a Crapsy account, upload a description and picture of my product and sell it quickly.</p>

		<h2>Use Case</h2>
		<p>Sally Seller, feeling extra creative, made 72 Elvis Presley paper mache dolls. She would like to share her work with the world for a reasonable price.</p>
		<p>Sally has researched a number of websites for selling homemade products. Crapsy seems to have the right feel and a customer base with just enough bad taste to see her products fly off the shelf.</p>
		<p>After deciding to move forward with Crapsy, she begins the process of creating an account and snapping good pictures of her lovely products.</p>

		<h2>Interaction Flow</h2>
		<ol>
			<li>After the seller has logged into their already established account (Profile table already populated with profileId as primary key), the seller begins to create an item for sale.</li>
			<li>The seller inputs a product name, description, available quantity, and uploads pictures. This information is populated in the Product table.</li>
			<li>The product is assigned a product number. Primary Key is created in the DB for Product table.</li>
			<li>Buyer lists product description, pictures, and reviews of available products.</li>
			<li>Buyer adds products to cart. Cart table is populated with cartId as primary key. One buyerId is added to Cart table. One or many cartProductIds are added to Cart table</li>
			<li>Buyer checks-out once all needed items are in cart.</li>
			<li>Buyer leaves new reviews for products. productReview populated in Product table. One productId can have many productReviews.</li>
		</ol>

		<h2>Conceptual Model</h2>
		<ol>
			<li>Profile</li>
			<ul>
				<li>profileId (Primary Key)</li>
				<li>profileActivationToken</li>
				<li>profileAtHandle</li>
				<li>profileEmail</li>
				<li>profileHash</li>
				<li>profilePhone</li>
				<li>profileSalt</li>
			</ul>
			<li>Product</li>
			<ul>
				<li>productId (Primary Key)</li>
				<li>productUserId (Foreign Key)</li>
				<li>productDescription</li>
				<li>productPrice</li>
				<li>productPicture</li>
				<li>productReviews</li>
			</ul>
			<li>Cart</li>
			<ul>
				<li>cartId (Primary Key)</li>
				<li>cartContents</li>
				<li>cartBuyerId (Foreign Key)</li>
				<li>cartProductId (Foreign Key)</li>
			</ul>
		</ol>
		<ol><p>Relationships</p>
			<li>One user has many products</li>
			<li>Many users can have many reviews</li>
			<li>One product has one description</li>
			<li>One product has one price</li>
			<li>One product has many pictures</li>
			<li>One product has many reviews</li>
			<li>One cart has many products</li>
			<li>Many products have many carts</li>
			<li>Many products can have many reviews</li>
		</ol>
	</body>
</html>