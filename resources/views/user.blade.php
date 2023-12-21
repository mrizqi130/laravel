<h1>table</h1>
<table border="1">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
        <td>password</td>
        <td>aksi</td>
    </tr>
    @foreach ($data as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
        <td>
            <a href="user/{{$user->id}}/delete">delete</a>
            <a href="user/{{$user->id}}/edit">update</a>
            <a href="/rapot/{{$user->id}}/nilai">nilai</a>
        </td>
    </tr>
    @endforeach
</table>
<?php
// session_start();
//print_r($_SESSION['key2']); ]
// session()->forget('key');
// echo "key : " . session('key');
// echo "<br>";
echo "email : " . session('email');
echo "<br>";
echo "password : {$session->get('password')}";
echo "<br>";
// echo "allsession : {{$session}}";
// print_r($session->get('password'));
echo "<br>";
?>
<!-- https://laravel.com/docs/10.x/urls -->
<a href="{{route('tes')}}">user</a>
<a href="/rapot">rapot</a>
<a href="{{url('login')}}">login</a>
<a href="regis">regis</a>
<a href="logout">logout</a>
<p>session flash : {{session('msg')}}</p>