@extends('layout.master')
@section('content')
 <div class="container marketing">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile No.</th>
      <th scope="col">Created Date</th>
    </tr>
  </thead>
  <tbody>
   
    @forelse($data as $a)
     <tr class="text-center">
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$a->name}}</td>
      <td>{{$a->email}}</td>
      <td>{{$a->mobile_no}}</td>
      <td>{{  strftime("%d %b %Y",strtotime($a->created_at)) }} {{  date('H:i', strtotime($a->created_at)) }}</td>
      
    </tr>
@empty
     <tr class="text-center">
      <th colspan="4">No Record Found</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
@endforelse
  </tbody>
</table>
</div>

@endsection