<h1>Login</h1>
<form action="{{route('cobalogin')}}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="text" name="email" id="email"><br>
    <label for="password">password</label>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="submit">
</form>

<a href="{{route('tes')}}">user</a>
<a href="{{url('/login')}}">login</a>
<a href="regis">regis</a>
<p>{{session('msg')}}</p>