@foreach($data as $row)
<div class="box-sizing border my-3 bg-light">
        <div class="m-2">
          <div id="bg-image"></div>
          <span class="badge badge-primary">User</span>
        </div>
        <a class="" href="#" style="text-decoration: none">
        <div class="ml-4 text-dark overflow-hidden">{!!$row->content!!}</div>
        </a>
      <p class="ml-4 text-muted"><small>Address: {{$row->address}}</small></p>
 </div>
@endforeach

<div class="d-flex justify-content-center align-items-center">{!! $data->links() !!}</div>


