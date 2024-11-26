<!DOCTYPE html>
<html>
<head>
    <title>Daily Motivation</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif; /* Use a web-safe sans-serif font */
            font-size: 18px!important; /* Larger font size for better readability on email clients */
            line-height: 1.6; /* Slightly increased line spacing */
            margin: 0; /* Remove default margins */
            padding: 20px; /* Add padding for spacing */
            background-color: #f5f5f5; /* Background color for improved readability */
        }

        h4 {
            /*font-size: 24px; !* Larger font size for headings *!*/
            margin-bottom: 15px; /* Slightly increased spacing below headings */
        }

        p {
            margin-bottom: 20px; /* Increased spacing between paragraphs */
            font-size: 15px;
        }

        span {
            font-weight: bold; /* Make team name bold */
        }

        /* Add additional styling as needed */
    </style>
</head>
<body>
<p>Here's your daily motivation.</p>
<p>Subject: {{$content['motivation']['Subject Line']}}</p>

<p>{{$content['motivation']['Greeting']}}</p>

<p>{{$content['motivation']['Introduction']}}</p>

<p>{{$content['motivation']['Body']}}</p>

<p>{{$content['motivation']['Closing']}}</p>

<p>Have fun and enjoy your day!</p>

<p>Regards,<br>
    <span>Grow Rich Journey</span>
</p>
</body>
</html>
