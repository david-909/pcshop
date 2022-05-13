<!DOCTYPE html>
<html>

<head>
    <title>PCShop.com</title>
</head>

<body>
    <h3>Thank you {{ $mailData['name'] . ' ' . $mailData['surname'] }}</h3>
    <h4>We have recieved your messaage and we will reply as soon as possible</h4>
    <br>
    <p>Message:</p>
    <p>{{ $mailData['text'] }}</p>

</body>

</html>
