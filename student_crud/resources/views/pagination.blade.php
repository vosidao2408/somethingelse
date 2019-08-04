<!DOCTYPE html>
<html>
 <head>
  <title>Laravel Live Data Search with Sorting & Pagination using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <h3 class="text-center mt-3">Welcome to Bantro.vn</h3>
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-3"></div>
      <div class="col-6">
        <div class="row">
          <div class="col-12">
              <input type="text" name="search" id="search" class="form-control" placeholder="Input Address Or District To Search"/>
              <div class="row">
                <div class="col-12"  style="background-color:#F0FFFF;">
                  <div id="items">
                      @include('pagination_data')
                    </div>    
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-3"></div>
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
    $('#items').html(data);
   }
    })
 }
 $(document).on('keyup', '#search', function(){
  var query = $('#search').val();
  fetch_data(query);
 });
});
</script>