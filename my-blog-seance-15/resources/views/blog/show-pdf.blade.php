<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: arial;
        }
    </style>
</head>
<body>
    <h1>{{ $blogPost->title}}</h1>
    <hr>
    <p>{{ $blogPost->body}}</p>
    <hr>
    {{$blogPost->blogHasUser->name}}
</body>
</html>