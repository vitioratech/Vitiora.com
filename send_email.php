<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = "ganesh920817@gmail.com";  // Replace with your email address
    $subjectEmail = "New Contact Form Submission: " . $subject;
    $messageEmail = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
    </head>
    <body>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $email\r\n";

    if (mail($to, $subjectEmail, $messageEmail, $headers)) {
        echo "<script>alert('Your message has been sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error sending message. Please try again later.'); window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='index.html';</script>";
}
?>
