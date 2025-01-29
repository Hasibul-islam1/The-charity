<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $amount = $_POST['amount'];
    $message = $_POST['message'];
    $name = $_POST['name'] ?? 'Anonymous Donor';
    $email = $_POST['email'] ?? 'N/A';
    $contact_number = $_POST['contact_number'] ?? 'N/A';
    $payment_method = $_POST['payment_method'];
    $date = date("Y-m-d H:i:s"); // Current timestamp
} else {
    // Redirect if accessed directly
    header("Location: donate.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .invoice { border: 1px solid #ccc; padding: 20px; width: 50%; margin: auto; }
        .invoice h2 { color: #333; }
        .details { text-align: left; margin: 20px; }
        .details p { margin: 5px 0; }
        .btn { margin-top: 20px; padding: 10px; background: blue; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="invoice">
    <h2>Donation Invoice</h2>
    <p><strong>Thank you for your generous donation!</strong></p>
    
    <div class="details">
        <p><strong>Donor Name:</strong> <?php echo $name; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Contact:</strong> <?php echo $contact_number; ?></p>
        <p><strong>Donation Amount:</strong> ৳<?php echo number_format($amount, 2); ?></p>
        <p><strong>Payment Method:</strong> <?php echo $payment_method; ?></p>
        <p><strong>Message:</strong> <?php echo $message; ?></p>
        <p><strong>Date:</strong> <?php echo $date; ?></p>
    </div>

    <button class="btn" onclick="window.print()">Print Invoice</button>
    <a href="index.php" class="btn" style="display: inline-block; padding: 10px 20px; background: blue; color: white; text-decoration: none; border-radius: 5px;">Back to Home</a>
</div>

</body>
</html>
