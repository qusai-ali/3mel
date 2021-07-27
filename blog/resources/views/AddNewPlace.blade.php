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
</head>
<style>
    .error{
        color:red;
    }
    </style>
<body>

<div class="container">
  <h2>Add New Place</h2>
  <form action="/admin/SaveNewplace/{{$category->id}}" method='post' enctype="multipart/form-data">
  @csrf 
    <div class="form-group">
      <label for="email">name</label>
      <input type="text" class="form-control" placeholder="Enter place name" name="name">
      <p class="error"> @error('name'){{$message}} @enderror</p>
    </div>
    <div class="form-group">
      <label for="pwd">Address</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Address" name="Address">
      <p class="error"> @error('Address'){{$message}} @enderror</p>
    </div>
    <div class="form-group">
      <label for="pwd">phone number</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter phone number" name="phone">
      <p class="error"> @error('phone'){{$message}} @enderror</p>
    </div>
    <div class="form-group">
      <label for="pwd">image</label>
      <input type="file" class="form-control" id="pwd" name="img">
      <p class="error"> @error('img'){{$message}} @enderror</p>
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">comment</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
  </div>
  <input type="hidden" name="category_id" value={{$category->id}} >
    <button type="submit" class="btn btn-primary">Submit</button>
    <a type="button" class="btn btn-danger" href="/admin/cities">Exit</a>
  </form>
</div>

</body>
</html>
