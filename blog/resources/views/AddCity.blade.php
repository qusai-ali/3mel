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
      .Astyle{
          float:right;
      }
  </style>
</head>
<body>

<div class="container">
  <h2>Add City</h2>
  <form action="/Admin/AddCity" method="post" class="was-validated" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="uname">City</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter CityName" name="name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
    <label for="uname">Image</label>
      <input type="file" class="form-control" id="image" placeholder="Enter Image" name="img" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    @error('img'){{$message}} @enderror 
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class ="btn btn-danger Astyle" href="/admin/cities">Exit</a>
  </form>
</div>

</body>
</html>
