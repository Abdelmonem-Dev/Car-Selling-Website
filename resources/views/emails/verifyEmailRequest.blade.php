<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
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
        .verify-button {
            display: inline-block;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .verify-button:hover {
            background-color: #0056b3;
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
            <h1>Verify Your Email Address</h1>
        </div>
        <div class="email-body">
            <p>Dear {{ $user->email }},</p>
            <p>Thank you for signing up with us! Please verify your email address to complete your registration.</p>
            <p>Click the button below to verify your email:</p>
            <p style="text-align: center;">
                <a href="{{ $verificationLink }}" class="verify-button">Verify Email</a>
            </p>
            <p>If the button above doesn’t work, copy and paste the following URL into your browser:</p>
            <p style="color: #007bff; word-break: break-word;">{{ $verificationLink }}</p>
            <p>If you did not create this account, you can safely ignore this email.</p>
        </div>
        <div class="footer">
            <p>If you have any questions or need assistance, feel free to <a href="mailto:support@example.com">contact our support team</a>.</p>
            <p>Thank you for joining us!</p>
        </div>
    </div>
</body>
</html>
