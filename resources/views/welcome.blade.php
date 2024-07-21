<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Welcome') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 2rem;
            text-align: center;
        }
        .header {
            margin-bottom: 2rem;
        }
        .header h1 {
            font-size: 2rem;
            color: #2d3748;
        }
        .content {
            font-size: 1.25rem;
            color: #4a5568;
        }
        .button {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
            font-size: 1rem;
            color: #fff;
            background-color: #3182ce;
            border-radius: 0.375rem;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }
        .button:hover {
            background-color: #2b6cb0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ __('Welcome Task Todo') }}</h1>
        </div>
        <div class="content">
            <p>{{ __('We are glad to have you here! Feel free to explore and let us know if you have any questions.') }}</p>
            <a href="{{ route('login') }}" class="button">{{ __('Login') }}</a>
        </div>
    </div>
</body>
</html>
