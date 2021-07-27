
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
table, th, td {

}
th, td {
  padding: 10px;
  text-align: left;
}
.be{

    margin-left:10%;
    margin-top:2%;
}

</style>
</head>
<body>
    <div class="be">
<Table width="25%" >
<tr>  <td > city name</td> <td>   {{$city->name}} </td></tr>
<tr> <td> created</td> <td rowspan=2>  
                                              @foreach($categories as $category) <br>
                                             {{$category->created_at->format('m/d/Y')}}<br>
                                       <a href="/admin/AddPlace/{{$category->id}}">{{$category->title}} </a> <br>
                                              @endforeach </td></tr>
<tr> <td> place</td> </tr>
</table>
<br>
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/AddCategory" method="post">
      @csrf 
      <div class="modal-body">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter Category" name="title" >
    <input type="hidden" name="cityid" value={{$city->id}} >
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Category</button>
        </form>

      </div>
    </div>
  </div>
</div>
</body>
</html>
