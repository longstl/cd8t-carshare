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
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong> {{ implode('', $errors->all(':message')) }}</strong>
    </div>
@endif
<form action="{{route('saveCar')}}" method="post">
    @csrf
    <input type="text" name="name">
    <input type="text" name="make">
    <input type="text" name="model">
    <input type="text" name="make_year">
    <button type="submit">Submit</button>
</form>
</body>
</html>
