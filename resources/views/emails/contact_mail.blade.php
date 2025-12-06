<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 650px;
            margin: 40px auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .header {
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .header img {
            max-width: 140px;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 22px;
            margin: 0;
            color: #0d6efd;
        }

        .header h2 {
            font-size: 16px;
            margin: 5px 0 0 0;
            color: #555;
            font-weight: normal;
        }

        .content p {
            font-size: 15px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .details {
            background: #f7f8fa;
            padding: 20px;
            border-left: 4px solid #0d6efd;
            border-radius: 8px;
            margin: 20px 0;
        }

        .details p {
            font-size: 14px;
            margin: 5px 0;
        }

        .footer {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin-top: 30px;
            border-top: 1px solid #e0e0e0;
            padding-top: 15px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset(setting('primary_logo')) }}" alt="{{ setting('app_name') }}">
            <h1>{{ setting('app_name') }}</h1>
            <h2>New Message Request Submitted</h2>
        </div>

        <div class="content">
            <p>Hello Admin,</p>
            <p>A new contact request has been submitted via your website. Here are the details:</p>

            <div class="details">
                <p><strong>Name:</strong> {{ $submission['name'] ?? 'N/A' }}</p>
                <p><strong>Email:</strong> {{ $submission['email'] ?? 'N/A' }}</p>
                <p><strong>Phone:</strong> {{ $submission['phone'] ?? 'N/A' }}</p>
                <p><strong>Subject:</strong> {{ $submission['subject'] ?? 'N/A' }}</p>
                <p><strong>Message:</strong> {{ $submission['message'] ?? 'N/A' }}</p>
            </div>

            <p>Please respond to the user as soon as possible.</p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} {{ setting('app_name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>
