<form action="/books" method="post" enctype="multipart/form-data">
<table>
    @csrf
<tr><td>name</td><td><input type="text" name="name"></td></tr>
<tr><td>category</td><td> <input type="text" name="category"></td></tr>
<tr><td>title</td><td> <textarea name="title" cols="30" rows="6"></textarea></td></tr>
<tr><td>quantity</td><td> <input type="text" name="quantity"></td></tr>
<tr><td>book</td><td> <input type="file" name="file"></td></tr>
<tr><td></td><td><input type="submit" value="create"></td></tr>



</table>

</form>
<h1>Create Post</h1>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif