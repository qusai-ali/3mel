<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
</head>
<style>
    .stylep{
        color:red;
        text-align:center;
        font-size:40px;
    }
</style>
<body>
    <p class="stylep">place Details</p>
    {{$city->name}}      ....
    {{$category->title}}   ....<br>
    @foreach($content as $content)
    {{$content->name}}....
    {{$content->Address}}...
    {{$content->comment}}...

    {{$content->phone_number}}<br>
    @endforeach


   

</body>
</html>