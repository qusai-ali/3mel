
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
.styleform{
    padding: 5%;
}
.styleExit{
  float: right;
}
</style>

</head>
<body>

<div class="container styleform">
  <h1>edit city</h1>
  <form action="/admin/updatecity/{{$EditCity->id}}" method="post" class="was-validated" enctype="multipart/form-data">
  @csrf 
    <div class="form-group">
      <label for="uname">edit city</label>
      <input type="text" class="form-control" name="newname" value="{{$EditCity->name}}" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <label for="uname">edit image</label>
    <br>
    <img width="30%" src= {{$EditCity->imgurl}} >
    
    <input  class="form-control" type="file" name="img">
    <br>
    <br>
    <button type="submit" class="btn btn-info">save</button>
    <a class="btn btn-danger styleExit" href="/admin/cities">Exit</a>
  </form>
</div>

</body>
</html>
