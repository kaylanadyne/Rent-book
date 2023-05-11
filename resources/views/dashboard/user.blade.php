@extends('layouts.master')

@section('title', 'user')
@section('content')

@if ($message = Session::get('success'))
    <div>
        <p>{{$message}}</p>
    </div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>No.hp</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach($data as $dt)
        <tr>       
          <td>{{$i++}}</td>
          <td>{{$dt->name}}</td>
          <td>{{$dt->email}}</td>
          <td>{{$dt->no_hp}}</td>
          <td>{{$dt->address}}</td> 
          <td>
          <form action="{{route('indexEditUser', $dt->id)}}" class="d-inline" >
            <button class="btn btn-outline-success">Edit</button>
            @csrf
          </form>

          <form action="{{route('delete', $dt->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">    
            <button class="btn btn-outline-danger" >Delete</button>
            @csrf
          </form>
          </td>     
        </tr>
        @endforeach
    </tbody>
</table>
@endsection