<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate the form data (optional)
    if (empty($name) || empty($email) || empty($message)) {
        // Set an error message
        $error = 'Please fill out all fields';
    } else {
        // Set the recipient email address
        $to = 'jansebastiankostlan@gmail.com';

        // Set the email subject
        $subject = 'New Contact Form Submission';

        // Build the email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Set the email headers
        $headers = "From: $name <$email>";

        // Send the email
        if (mail($to, $subject, $email_content, $headers)) {
            // Set a success message
            $status = 'Your message was sent successfully';
        } else {
            // Set an error message
            $error = 'There was a problem sending your message';
        }
    }
}

?>