<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Hi {{$user['name']}}, <br>You have been registered on Unify as one of the stakeholders.</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to login to your account
<br/>
<a href="{{route('homepage')}}">Click Here</a><br/>
You can use your email address as the email and password to login after which you can then change your password
</body>

</html>
