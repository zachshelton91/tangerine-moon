<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]);

$errors = '';
$myemail = $_POST['zachshelton91@gmail.com'];//<-----Put Your email address here.
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if(empty($errors))
{
	$to = $myemail;
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n ".
	"Email: $email_address\n Message \n $message";
	$headers = "From: $myemail\n";
	$headers .= "Reply-To: $email_address";
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	// header('Location: contact-form-thank-you.html');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tangerine Moon - Baking by Lindsey Cameron</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- <script src="script.js"></script> -->
	<link href="https://fonts.googleapis.com/css?family=Cookie&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400&display=swap" rel="stylesheet">
</head>
<body>
	<div class = "container">
		<div class = "header">
			<img class = "header-img" src = "media/tm-logo.png">
			<h1>Organic &bull; Natural &bull; Homemade</h1>
			<h2>Baking by Lindsey Cameron</h2>
		</div>
		<div class="content">
			<img class="inline-photo" src="media/inline-photo-cropped-bw.jpg">
			<div class="about">
				<p>Whether you're vegan, paleo or anything in between, we all deserve dessert. Treating Houston and Central Texas, Tangerine Moon was founded so that your health and happiness can always include a meal that ends with a sweet, tasty sweet. Each cake, pie and pastry is homemade with your needs in mind.</p>
				<p>Call (713) XXX-XXXX or shoot us a message below to place an order, ask a question or just tell us how awesome you think we are! Don't forget to follow us on Instagram!</p>
				<p>Love, TM.</p>
			</div>
		</div>
		<div class = "order">
			<h2>Contact Us</h2>
			<form method="post" action="index.php">
				<div>
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" placeholder="Required" onfocus="this.placeholder=''" onblur="this.placeholder='Required'"> *
				</div>
				<div>
					<label for="mail">E-mail:</label>
					<input type="email" id="email" name="email" placeholder="Required" onfocus="this.placeholder=''" onblur="this.placeholder='Required'"> *
				</div>
				<div>
					<label for="msg">Message:</label>
					<textarea id="msg" name="message" onfocus="if(this.value== 'How can we help you?'){this.value=''}; return false;" onblur="this.value='How can we help you?'">How can we help you?</textarea> *
				</div>
				<div class="button">
					<button type="submit">Send!</button>
				</div>
			</form>
		</div>
	</div>
	<script src="script.js"></script>
</body>
</html>