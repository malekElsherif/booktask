
@extends('layouts.app')

@section('content')
<!-- <nav class="navbar navbar-light bg-light">
  <form class="form-inline" action="search" method="post">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav> -->
<h1>users data</h1>
<table border="1">

<tr><th>id</th> <th>name</th> <th>email</th> <th>created_at</th> <th>updated_at</th></tr>
@foreach($users as $user)

<tr><td>{{$user->id}}</td> 
<td>{{$user->name}}</td> 
<td>{{$user->email}}</td> 

<td>{{$user->created_at}}</td> 
<td>{{$user->updated_at}}</td> 


@endforeach
</table>	
@endsection

</div>


<style>

    th {
        text-align: center;
        padding: 10px;
    }

    td{
        text-align: center;
    }
    .create{
        text-decoration: none;
        color: white;
        background-color: green;
        border-radius: 8px;
    }
</style>