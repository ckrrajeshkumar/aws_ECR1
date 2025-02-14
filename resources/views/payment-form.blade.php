<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered String and Stripe Form</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .center-content {
            text-align: center;
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .center-content h1 {
            margin: 0 0 1rem;
            font-size: 2rem;
            color: #333;
        }

        #payment-form {
            margin-top: 1rem;
        }

        .form-row {
            margin-bottom: 1rem;
        }

        #card-element {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        #card-errors {
            color: red;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        #token-display {
            margin-top: 1rem;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 0.9rem;
            color: #333;
            word-break: break-word;
            cursor: pointer;
        }

        button {
            margin-top: 1rem;
            padding: 10px 15px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .center-content h1 {
                font-size: 1.5rem;
            }

            button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<div class="center-content">
    <form id="payment-form">
        <div class="form-row">
            <label for="card-element">Credit or debit card</label>
            <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>
            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>
        <button type="submit">Submit Payment</button>
    </form>
    <div id="token-display" style="display: none;" onclick="copyToClipboard()">Click to copy the token</div>
</div>

<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();

    var style = {
        base: {
            color: "#32325d",
            fontFamily: 'Arial, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#aab7c4"
            }
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
        }
    };

    var card = elements.create("card", { style: style, hidePostalCode: true });
    card.mount("#card-element");

    var form = document.getElementById("payment-form");
    var tokenDisplay = document.getElementById("token-display");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById("card-errors");
                errorElement.textContent = result.error.message;
            } else {
                displayToken(result.token);
            }
        });
    });

    function displayToken(token) {
        tokenDisplay.style.display = "block";
        tokenDisplay.textContent = token.id;
    }

    function copyToClipboard() {
        var range = document.createRange();
        range.selectNode(tokenDisplay);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
        alert("Token copied to clipboard!");
    }
</script>
</body>
</html>
