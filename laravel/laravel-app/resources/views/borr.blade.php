
@extends('layouts.app')

@section('content')
<div class="container">

<table border="1">

<tr><th>id</th> <th>user_id</th> <th>book_id</th> <th>borrowed_at </th></tr>
@foreach($borrs as $borr)

<tr><td>{{$borr->id}}</td> 
<td>{{$borr->user_id}}</td> 
<td>{{$borr->book_id}}</td> 
<td>{{$borr->borrowed_at}}</td> 







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