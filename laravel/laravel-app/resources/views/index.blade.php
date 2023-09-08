
@extends('layouts.app')

@section('content')
<div class="container">
<a href="borr">borrowed</a>
<a href="books/create" class="create">create</a>
<a href="/users" class="create">users data</a>
<table border="1">

<tr><th>id</th> <th>name</th> <th>category</th> <th>title </th> <th>book</th> <th>quantity</th> <th>Actions</th></tr>
@foreach($books as $book)

<tr><td>{{$book->id}}</td> 
<td>{{$book->name}}</td> 
<td>{{$book->category}}</td> 
<td>{{$book->title}}</td> 
<td><img src="/images/{{$book->file}}" alt="" width="50px" height=""></td>
 <td>{{$book->quantity}}</td>
 <td><a href="books/{{$book->id}}">📖</a></td>
 <td><a href="books/{{$book->id}}/edit">✏️</a></td>
 <td>
<form action="books/{{$book->id}}" method="post">
@method('delete')
@csrf

<input type="submit" value="❌">

</form>

 </td>
 <td>{{$book->title}}</td> 

</tr>

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