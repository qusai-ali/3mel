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
      .h2style{
          text-align:center;
          color:red;
      }
  </style>
</head>
<body>

<div class="container">
    <br>
  <h2  class="h2style"><strong>Control City</strong></h2>
  <br>
  <br>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Number</th>        <th>Name</th>    <th>Edit</th>   <th>Delete</th>  <th>Date</th><th>Details</th>
      </tr>
    </thead>
    <tbody>
      @for ($i = 0; $i<$count;$i++)
      <td>
       <?php
        echo $i+1
       ?>
      </td>
      <td>{{$index[$i]->name}}</td>
 
   <td><a class="btn btn-info" href="/admin/EditCity/{{$index[$i]->id}}">Edit </a></td>
   <td><a class="btn btn-danger" href ="/admin/deletecity/{{$index[$i]->id}}">Delet</a></td>
   <td>{{$index[$i]-> created_at->format('m/d/Y')}}</td>
   <td><a class="btn btn-warning" href="/admin/GetDetails/{{$index[$i]->id}}">GetDetails</a>  </td>
    </tbody>
    @endfor
    <a href="/Admin/AddNewCity">Add New City</a>
    
  </table>
</div>

</body>
</html>
