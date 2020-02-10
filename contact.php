<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form'; 
		$to = 'lucasdreher@gmail.com'; 
		$subject = 'Message from Contact Demo ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'No name?';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Write a valid email.';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'What was the message?';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 7) {
			$errHuman = 'What is the result of 3 + 4?';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?> <!DOCTYPE HTML><html><head><title>Contact</title><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]--><link rel="stylesheet" href="assets/css/main.css"><!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]--><!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]--></head><body><div id="page-wrapper"><header id="header"><h1 id="logo"><a href="index.html">Home</a></h1></header><div id="main" class="wrapper style1"><div class="container"><header class="major"><h2>Contact Me!</h2><p>Send me a message</p></header><section id="content"><form role="form" method="post" action="contact.php" onsubmit="return validate.check(this)"><div class="row uniform 50%"><div class="6u 12u$(xsmall)"><input type="text" class="form-control" id="name" name="name" placeholder="Full name" value="<?php echo htmlspecialchars($_POST['name']); ?>"> <?php echo "<p class='text-danger'>$errName</p>";?> </div><div class="6u$ 12u$(xsmall)"><input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>"> <?php echo "<p class='text-danger'>$errEmail</p>";?> </div><div class="12u$"><textarea class="form-control" rows="6" name="message" placeholder="Message"><?php echo htmlspecialchars($_POST['message']);?></textarea> <?php echo "<p class='text-danger'>$errMessage</p>";?> </div><div class="12u$"><input type="text" class="form-control" id="human" name="human" placeholder="3 + 4 = ?"> <?php echo "<p class='text-danger'>$errHuman</p>";?> </div><div class="12u$"><ul class="actions"><li><input id="submit" name="submit" type="submit" value="Send" class="special"></li><li><input type="reset" value="Reset"></li></ul></div></div></form></section></div></div><footer id="footer"><ul class="icons"><li><a href="https://twitter.com/comlucasdreher" target="_blank" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li><li><a href="https://www.facebook.com/lucasdreherdesign" target="_blank" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li><li><a href="https://www.linkedin.com/in/lucas-dreher" target="_blank" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li><li><a href="https://www.instagram.com/comlucasdreher" target="_blank" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li><li><a href="mailto:lucasdreher@gmail.com" target="_blank" class="icon alt fa-envelope"><span class="label">Email</span></a></li></ul><ul class="copyright"><li>&copy; Lucas Dreher. All rights reserved.</li></ul></footer></div><script>(function(e,t,a,n,c,o,s){e.GoogleAnalyticsObject=c,e[c]=e[c]||function(){(e[c].q=e[c].q||[]).push(arguments)},e[c].l=1*new Date,o=t.createElement(a),s=t.getElementsByTagName(a)[0],o.async=1,o.src=n,s.parentNode.insertBefore(o,s)})(window,document,"script","https://www.google-analytics.com/analytics.js","ga"),ga("create","UA-24777786-3","auto"),ga("send","pageview")</script><script src="assets/js/jquery.min.js"></script><script src="assets/js/jquery.scrolly.min.js"></script><script src="assets/js/jquery.dropotron.min.js"></script><script src="assets/js/jquery.scrollex.min.js"></script><script src="assets/js/skel.min.js"></script><script src="assets/js/util.js"></script><!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]--><script src="assets/js/main.js"></script></body></html>