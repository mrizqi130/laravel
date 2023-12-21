<h1>regis</h1>
<!-- <form action="regis-submit" method="post"> -->
<form action="{{$action}}" method="post">
    @csrf
    <label for="name">name</label>
    <input type="text" name="name" id="name" value="{{isset($data)?$data->name:''}}"><br>
    <label for="email">email</label>
    <input type="email" name="email" id="email" value="{{isset($data)?$data->email:''}}"><br>
    <label for="password">password</label>
    <input type="password" name="password" id="password"><br>
    <input type="hidden" name="_password" id="password" name="{{isset($data)?$data->password:''}}"><br>
    <input type="submit" value="submit">
</form>
<a href="{{route('tes')}}">user</a>
<a href="{{url('/login')}}">login</a>
<a href="regis">regis</a>
<p>{{session('msg')}}</p>