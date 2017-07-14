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
			<li>After the user has logged into their already established account, the user begins to create an item for sale.</li>
			<li>The user inputs a product name, description, available quantity, and uploads pictures.</li>
			<li>The product is assigned a product number.</li>
			<li>The user makes their item available for sale.</li>
			<li>Buyer scrolls through available products.</li>
			<li>Buyer views product description, pictures, and reviews of available products.</li>
			<li>Buyer chooses to purchase available products.</li>
			<li>Buyer adds products to cart</li>
			<li>Buyer checks-out once all needed items are in cart</li>
			<li>Buyer leaves new reviews for products.</li>
		</ol>

		<h2>Conceptual Model</h2>
		<ul>
			<li>One user has one profile</li>
			<li>One user has many products</li>
			<li>Many users can have many reviews</li>
			<li>One product has one description</li>
			<li>One product has one price</li>
			<li>One product has many pictures</li>
			<li>One product has many reviews</li>
			<li>One buyer has one profile</li>
			<li>One buyer has many carts</li>
			<li>One cart has one buyer</li>
			<li>One cart has many products</li>
			<li>Many products have many carts</li>
			<li>Many products can have many reviews</li>
		</ul>
	</body>
</html>