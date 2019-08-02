<!DOCTYPE html>
<html>
 <head>
  <title>Laravel Live Data Search with Sorting & Pagination using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 class="text-center">Laravel Live Data Search with Sorting & Pagination using Ajax</h3><br />
   <div class="row">
    <div class="col-md-9">

    </div>
    <div class="col-md-12">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Input TO Search"/>
     </div>
    </div>
   </div>
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>ID</th>
       <th>Title</th>
       <th>Address</th>
       <th>Contact</th>
       <th>Status</th>
      </tr>
     </thead>
     <tbody>
      @include('pagination_data')
     </tbody>
    </table>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 function fetch_data(query)
 {
  $.ajax({
    url:"{{ route('search') }}",
    method:'GET',
    data:{query:query},
   success:function(data)
   {
    $('tbody').html(data);
   }
    })
 }

 $(document).on('keyup', '#search', function(){
  var query = $('#search').val();
  fetch_data(query);
 });
});
</script>
