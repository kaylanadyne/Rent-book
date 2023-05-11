@extends('layouts.master')


@section  ('title', 'book')
@section('content')
<br><h1><strong>Data Books</strong></h1><br>
<a href="/book/form"><button class="btn btn-success">Create +</button></a> 
<br>
<table class="table dark">
  <thead>
      <tr style="text-align: center" class="table-striped">
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Writer</th>
          <th scope="col">Publisher</th>
          <th scope="col">Synopsis</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
      </tr>
  </thead>
 <?php $i =1; ?>
  @foreach ($book as $item)
      <tbody>
          <tr style="text-align: center">
              <td>{{$i++}}</td>
              <td>{{ $item->title }} </td>
              <td>{{ $item->writer }} </td>
              <td>{{ $item->publisher }} </td>
              <td>{{ $item->synopsis }} </td>

                @if($item->image)
                <td class="image-table"><img src="/images/{{ $item['image'] }}"  style="width: 90px;"></td>
                @else
                <td>-</td>
                @endif
              
              <td>
                  <button type="submit" class="btn btn-outline-primary">Edit</button>
                  <form action="{{route('delete', $item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">    
                    <button class="btn btn-outline-danger" >Delete</button>
                    @csrf
                </form>
              </td>
          </tr>
      </tbody>
  @endforeach
</table>
@endsection