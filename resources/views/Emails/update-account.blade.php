<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to the site {{$user['name']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to Update your account
<br/>
<a href="{{route('user.update-account', ["email" => $user->token])}}">Update Your Account</a>
</body>
</html>
