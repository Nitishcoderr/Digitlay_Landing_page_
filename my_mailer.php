<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Digitlay Contact Mail</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            text-align: center;
        }

        p {
            color: #555555;
        }

        .button {
            display: inline-block;
            background-color: #4285f4;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 3px;
        }

        /* Additional styling for a colorful and attractive look */
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 200px;
            height: auto;
        }

        /* Additional styling for centering contact information */
        .contact-info {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .contact-info p {
            text-align: left;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://www.digitlay.com/images/logo.png" alt="Logo">
        </div>
        <div class="contact-info">
            <h2>Contact Information</h2>
            <p><strong>Name:</strong> {NAME}</p>
            <p><strong>Email:</strong> {EMAIL}</p>
            <p><strong>Phone:</strong> {PHONE}</p>
            <p><strong>Message:</strong> {MESSAGE}</p>
        </div>
    </div>
</body>
</html>
