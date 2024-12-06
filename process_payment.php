<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Payment Processing</title>
    <style media="screen">
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
        }

        select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="process_payment.php" method="post">
        <h2>Select a Payment Method</h2>

        <label for="paymentMethod">Payment Method:</label>
        <select id="paymentMethod" name="paymentMethod">
            <option value="visa">Visa</option>
            <option value="mastercard">Mastercard</option>
            <option value="paypal">PayPal</option>
            <option value="unionpay">UnionPay</option>
            <option value="linepay">Line Pay</option>
            <option value="m-pesa">M-pesa</option>
        </select>

        <label for="totalAmount">Total Amount:</label>
        <input type="text" id="totalAmount" name="totalAmount" value="Enter total amount" required>

        <br><br>

        <button type="submit">Pay Now</button>
    </form>
</div>
</body>
</html>

