<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghee Project - Footer</title>
    <!-- Add your CSS stylesheets here -->
    <style>
        /* Add your CSS styles for the footer here */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .footer {
            background-color: #333;
            padding: 40px 0;
            text-align: center;
            color: #fff;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer p {
            margin-bottom: 20px;
        }
        .footer h5 {
            margin-bottom: 15px;
            font-size: 18px;
        }
        .footer ul {
            list-style: none;
            padding: 0;
        }
        .footer ul li {
            display: inline-block;
            margin-right: 10px;
        }
        .footer img {
            width: 50px; /* Adjust as needed */
            height: auto;
        }
        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .footer .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .footer .col {
            flex: 1;
            margin: 0 10px;
            text-align: left;
        }
        @media (max-width: 768px) {
            .footer .col {
                flex-basis: 100%;
                margin: 10px 0;
            }
        }
        .footer .col:last-child {
            text-align: center;
        }
        .footer input[type="email"] {
            padding: 8px;
            border: none;
            border-radius: 4px;
            margin-right: 10px;
            width: 200px;
        }
        .footer button {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .footer button:hover {
            background-color: #0056b3;
        }
        .footer .copyright {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col">
                <h5>About Us</h5>
                <p>Uma Ghee is dedicated to providing the highest quality ghee products. Our commitment to excellence starts from sourcing the finest ingredients to delivering a product that exceeds expectations. With a focus on purity, taste, and tradition, we aim to bring the authentic flavors of ghee to your kitchen.</p>
            </div>
            <div class="col">
                <h5>Address</h5>
                <p>38/1, Sonilhorkcondu Street.<br>
                Veeropon, Chathiram.<br>
                Erode-638 004.</p>
                <h5>Phone: +91 9790264009</h5>
            </div>
            <div class="col">
                <h5>Email</h5>
                <p>sriuma4009@gmail.com</p>
            </div>
            <div class="col">
                <h5>Payments</h5>
                <ul>
                    <li>
                        <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                    </li>
                    <li>
                        <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5>Subscribe to Our Newsletter</h5>
                <input type="email" placeholder="Enter your email"><button>Subscribe</button>
            </div>
            <div class="col">
                <h5>Customer Support</h5>
                <p>For any inquiries or assistance, please don't hesitate to reach out to our dedicated customer support team.</p>
                <a href="#">Contact Support</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="copyright">&copy; 2024 Uma Ghee. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
