
@extends('layouts.app')

@section('content')
<div class="container">


<table border="1">
<a href="borr">borrowed</a>
<tr><th>book</th>  <th>name</th> <th>quantity</th> <th>Actions</th></tr>
@foreach($books as $book)

<td><img src="/images/{{$book->file}}" alt="" width="50px" height=""></td>
<td>{{$book->name}}</td> 
<td>{{$book->quantity}}</td>
 <td><a href="books/{{$book->id}}">📖</a></td>
 <td>
    <form method='post' action="books/{{$book->id}}/borrow" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="submit" value="Borrow">
    </form>
</td>
  

    <td>
    <form method='post' action="books/{{$book->id}}/return" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="submit" value="return">
    </form>
</td>

 


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



