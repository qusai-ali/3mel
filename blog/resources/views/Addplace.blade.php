<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .stylediv{
margin-top:30px;
        margin-left:30px;
    }
</style>
<body>

<div class="stylediv">
    <br>
    @foreach($content as $contents)
    {{$contents->name}} 
    {{$contents->Address}} 
    {{$contents->comment}} 
    {{$contents->phone_number}}
    
    <img width="30%" src= {{$contents->img}} >

    <br>
    @endforeach
    <br>
    <br>
    <a type="button" class="btn btn-info" href="/admin/AddNewPlace/{{$category->id}}">AddPlace</a>

</div>
</body>
</html>