@foreach($data as $row)
<tr>
 <td>{{ $row->id}}</td>
 <td>{{ $row->title }}</td>
 <td>{{ $row->address }}</td>
<td>{{$row->contact}}</td>
<td>{{$row->status}}</td>
</tr>
@endforeach
<tr>
 <td colspan="5" class="text-center">
  {!! $data->links() !!}
 </td>
</tr>
