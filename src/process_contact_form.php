<?php
// Check if form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data and sanitize it to prevent XSS attacks
  $name = htmlspecialchars($_POST['name'] ?? '');
  $email = htmlspecialchars($_POST['email'] ?? '');
  $message = htmlspecialchars($_POST['message'] ?? '');
} else {
  // If accessed directly (not via form), redirect back to form
  header('Location: contact_form.html');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="form-body">
  <div class="form-container">
    <h1 class="success-title">✅ Thank You!</h1>
    <!-- Success message to confirm form submission -->
    <div class="success">
      Your message has been received successfully!
    </div>
    <!-- Display the submitted form data back to user -->
    <div class="form-data">
      <h3>Your submission:</h3>
      <!-- PHP echo outputs the sanitized form data -->
      <p><strong>Name:</strong> <?php echo $name; ?></p>
      <p><strong>Email:</strong> <?php echo $email; ?></p>
      <!-- nl2br converts line breaks to HTML <br> tags -->
      <p><strong>Message:</strong><br><?php echo nl2br($message); ?></p>
    </div>
    <!-- Navigation links for user to continue -->
    <p>
      <a href="index.html">← Back to Home</a> | 
      <a href="contact_form.html">Send Another Message</a>
    </p>
  </div>
</body>
</html>
