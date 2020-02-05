<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to the site {{$user['name']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to to reset your password
<br/>
<a href="{{route('user.retrieve.forgot-password', ["token" => $user->token])}}">Reset Password</a>
</body>

</html>
