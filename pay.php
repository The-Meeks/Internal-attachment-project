<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if payment data is received
    if (isset($_POST["paymentMethod"], $_POST["totalAmount"])) {
        $paymentMethod = $_POST["paymentMethod"];
        $totalAmount = $_POST["totalAmount"];

        // Validate input data
        if (empty($paymentMethod) || !is_numeric($totalAmount) || $totalAmount <= 0) {
            // If any required data is missing or invalid, display an error message
            echo "<p>Error: Invalid input data. Please provide valid information.</p>";
        } else {
            // Process payment based on the selected payment method
            switch ($paymentMethod) {
                case "visa":
                case "mastercard":
                    // Implement payment processing for credit/debit cards
                    echo "<p>Processing payment via $paymentMethod... Total amount: $totalAmount</p>";
                    // Add your payment processing logic here for credit/debit cards
                    break;
                case "paypal":
                    // Implement payment processing for PayPal
                    echo "<p>Redirecting to PayPal for payment... Total amount: $totalAmount</p>";
                    // Add your payment processing logic here for PayPal
                    break;
                case "unionpay":
                    // Implement payment processing for UnionPay
                    echo "<p>Processing payment via UnionPay... Total amount: $totalAmount</p>";
                    // Add your payment processing logic here for UnionPay
                    break;
                case "linepay":
                    // Implement payment processing for Line Pay
                    echo "<p>Redirecting to Line Pay for payment... Total amount: $totalAmount</p>";
                    // Add your payment processing logic here for Line Pay
                    break;
                case "m-pesa":
                    // Implement payment processing for M-pesa
                    echo "<p>Processing payment via M-pesa... Total amount: $totalAmount</p>";
                    // Add your payment processing logic here for M-pesa
                    break;
                default:
                    echo "<p>Error: Invalid payment method selected.</p>";
            }
        }
    } else {
        echo "<p>Error: Payment data missing.</p>";
    }
} else {
    echo "<p>Error: Form not submitted.</p>";
}
?>
