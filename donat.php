<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $message = $_POST['message'];
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $contact_number = $_POST['contact_number'] ?? null;
    $payment_method = $_POST['payment_method'];

    $conn = new mysqli('localhost', 'root', '', 'charity');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare('INSERT INTO donations (amount, message, name, email, contact_number, payment_method) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('dsssss', $amount, $message, $name, $email, $contact_number, $payment_method);

    if ($stmt->execute()) {
        echo 'Thank you for your donation!';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Now</title>
    <link rel="stylesheet" href="css/donat.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h2>DONATE NOW</h2>

            <!-- Donation Amount Buttons -->
            <div class="amount-options">
                <button type="button" onclick="setAmount(10000)">৳ 10000</button>
                <button type="button" onclick="setAmount(20000)">৳ 20000</button>
                <button type="button" onclick="setAmount(30000)">৳ 30000</button>
                <button type="button" onclick="setAmount(40000)">৳ 40000</button>
                <button type="button" onclick="setAmount(50000)">৳ 50000</button>
                <button type="button" onclick="setAmount(60000)">৳ 60000</button>
                <!-- Add more buttons as needed -->
                <input type="number" name="amount" placeholder="(BDT) Other Amount" id="amount-input" required>
            </div>

            <!-- Message Field -->
            <textarea name="message" placeholder="TYPE YOUR MESSAGE" rows="4"></textarea>

            <!-- Contact Information -->
            <input type="checkbox" id="provide-info" onclick="toggleContactInfo()"> I WANT TO PROVIDE MY INFORMATION
            <div id="contact-info" style="display:none;">
                <input type="text" name="name" placeholder="Your Name">
                <input type="email" name="email" placeholder="Email Address">
                <input type="text" name="contact_number" placeholder="Contact Number">
            </div>

            <!-- Payment Method Dropdown -->
            <label for="payment-method">Choose Payment</label>
            <select name="payment_method" id="payment-method" required>
                <option value="Bkash">Bkash</option>
                <option value="Nogod">Nogod</option>
                <option value="Upay">Upay</option>
                <option value="D-money">D-money</option>
            </select>

            <!-- Submit Button -->
            <button type="submit">DONATE NOW</button>
        </form>
    </div>

    <script>
        function setAmount(amount) {
            document.getElementById('amount-input').value = amount;
        }

        function toggleContactInfo() {
            var contactInfo = document.getElementById('contact-info');
            contactInfo.style.display = contactInfo.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
