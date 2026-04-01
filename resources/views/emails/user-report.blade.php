<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Registration Alert</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #dc3545; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background-color: #f8f9fa; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; }
        .user-info { background-color: white; padding: 15px; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚨 New User Registration</h1>
        </div>

        <div class="content">
            <h2>A new user has registered on {{ config('app.name') }}</h2>

            <div class="user-info">
                <h3>User Details:</h3>
                <ul>
                    <li><strong>Name:</strong> {{ $name }}</li>
                    <li><strong>Email:</strong> {{ $email }}</li>
                    <li><strong>Registration Time:</strong> {{ $registered_at }}</li>
                </ul>
            </div>

            <p>Please review the new user registration and take any necessary actions.</p>

            <p>This is an automated notification from the {{ config('app.name') }} registration system.</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>