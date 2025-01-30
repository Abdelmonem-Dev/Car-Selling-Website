<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding-bottom: 20px;
        }
        .email-header h1 {
            color: #333;
            font-size: 28px;
        }
        .email-body {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .token {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            padding: 10px;
            background-color: #f1f8ff;
            border-radius: 4px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Password Reset Request</h1>
        </div>
        <div class="email-body">
            <p>Dear user,</p>
            <p>We have received a request to reset your password. Please find your password reset token below:</p>
            <p class="token">{{ $token }}</p>
            <p>To reset your password, simply enter the token above on the password reset page.</p>
            <p>If you did not request this password reset, please ignore this email. Your password will remain unchanged.</p>
        </div>
        <div class="footer">
            <p>If you have any questions or need assistance, feel free to <a href="mailto:support@example.com">contact our support team</a>.</p>
            <p>Thank you for using our service!</p>
        </div>
    </div>
</body>
</html>
