<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Confirmation</title>
</head>

<body>
    <h1>Thank you for registering with us!</h1>
    <p>Dear {{ $get_user_name }},</p>
    <p>We are delighted to have you as a member of our community. Your registration has been successful.</p>
    <p>Please use the following token to verify your account:</p>
    <p>{{ $validToken }}</p>
    <p>If you have any questions or need assistance, feel free to contact our support team.</p>
    <p>Thank you once again, and we look forward to serving you!</p>
</body>

</html>
