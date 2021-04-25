<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('saveLicense')}}" method="post">
@csrf
    <input type="text" name="driving_license_number">
    <input type="date" name="driving_license_valid_from">
    <input type="date" name="driving_license_valid_to">
    <button type="submit">Submit</button>
</form>

</body>
</html>
