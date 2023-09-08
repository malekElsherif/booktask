<form action="/edit/{id}" method="post">
<table>
@csrf
@method('put')
<tr><td>name</td><td><input type="text" name="name"></td></tr>
<tr><td>email</td><td> <input type="email" name="email"></td></tr>
<tr><td>password</td><td> <input type="text" name="password"></td></tr>
<tr><td></td><td><input type="submit" value="update profile"></td></tr>



</table>

</form>
<h1>edit profile</h1>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif