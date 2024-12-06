<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <title>Rental Dashboard</title>
    <style>
        body {
            background-image: url('image1.jpg');
        }

        /* Add any additional styles as needed */
    </style>
</head>

<body>
    <div class="container">
        <h1>Rental Dashboard</h1>
        <form id="rentalForm" action="payment.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="unit">Select a Unit:</label>
            <select id="unit" name="unit" required>
                <option value="Unit 101">Unit 101</option>
                <option value="Unit 102">Unit 102</option>
                <option value="Unit 103">Unit 103</option>
                <option value="Unit 104">Unit 104</option>
                <option value="Unit 105">Unit 105</option>
                <option value="Unit 106">Unit 106</option>
                <option value="Unit 107">Unit 107</option>
                <option value="Unit 108">Unit 108</option>
            </select>

            <label for="months">Number of Months:</label>
            <input type="number" id="months" name="months" min="1" required>

            <button type="button" onclick="calculateTotal()">Calculate Total</button>

            <div id="result" style="display: none;">
                <p id="unitDisplay"></p>
                <p id="monthsDisplay"></p>
                <p id="totalDisplay"></p>
            </div>

            <input type="hidden" id="total" name="total">

            <!-- This button will submit the form to payment.php -->
            <button type="submit">Proceed to Payment</button>
        </form>
    </div>

    <script>
        function calculateTotal() {
            const unitPrices = {
                'Unit 101': 10,
                'Unit 102': 20,
                'Unit 103': 30,
                'Unit 104': 40,
                'Unit 105': 50,
                'Unit 106': 60,
                'Unit 107': 70,
                'Unit 108': 80
            };

            const unitSelect = document.getElementById('unit');
            const monthsInput = document.getElementById('months');
            const unitDisplay = document.getElementById('unitDisplay');
            const monthsDisplay = document.getElementById('monthsDisplay');
            const totalDisplay = document.getElementById('totalDisplay');
            const resultDiv = document.getElementById('result');

            const selectedUnit = unitSelect.value;
            const numberOfMonths = parseInt(monthsInput.value, 10);

            if (!isNaN(numberOfMonths) && numberOfMonths > 0) {
                const totalPrice = unitPrices[selectedUnit] * numberOfMonths;
                unitDisplay.textContent = `Rental Storage Unit: ${selectedUnit}`;
                monthsDisplay.textContent = `Number of Months: ${numberOfMonths}`;
                totalDisplay.textContent = `Total Price: $${totalPrice}`;
                resultDiv.style.display = 'block';
                // Set the total value in the hidden input field for submission
                document.getElementById('total').value = totalPrice;
            } else {
                alert('Please enter a valid number of months.');
            }
        }
    </script>
</body>

</html>
