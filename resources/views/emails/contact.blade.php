<!DOCTYPE html>
<html>

<head>
    <title>PCShop.com</title>
</head>

<body>
    <h1>{{ $mailData['name'] . ' ' . $mailData['surname'] }}</h1>
    <h1>{{ $mailData['email'] }}</h1>

    <p>{{ $mailData['text'] }}</p>

</body>

</html>
