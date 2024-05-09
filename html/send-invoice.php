<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $paymentMethod = $_POST['payment-method'];

    // Generate invoice HTML
    $invoiceHTML = "
        <h2>Invoice</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Address:</strong> $address</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Payment Method:</strong> $paymentMethod</p>
        <!-- Add more invoice details as needed -->
    ";

    // Send invoice to email
    $to = $email;
    $subject = "Invoice";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: your@example.com" . "\r\n"; // Replace with your email address
    $message = $invoiceHTML;

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Invoice sent successfully.";
    } else {
        echo "Failed to send invoice.";
    }
}
?>
