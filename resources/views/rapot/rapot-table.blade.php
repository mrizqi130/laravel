<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<?php
print_r(session()->all());
?>
<h1>table rapot {{isset($name)?$name:''}}</h1>
<table border="1">
    <tr>
        <td>id</td>
        <td>fk_user</td>
        <td>mk</td>
        <td>nilai</td>
        <td>aksi</td>
    </tr>
    @foreach ($data as $rapot)
    <tr>
        <td>{{$rapot->id}}</td>
        <td><a href="/rapot/{{$rapot->fk_user}}/nilai">{{$rapot->fk_user}}</a></td>
        <td>{{$rapot->mk}}</td>
        <td>{{$rapot->nilai}}</td>
        <td>
            <a href="/rapot/{{$rapot->id}}/delete">delete</a>
            <a href="/rapot/{{$rapot->id}}/edit">update</a>
        </td>
    </tr>
    @endforeach
</table>
<!-- https://laravel.com/docs/10.x/urls -->
<a href="/rapot">rapot</a>
<a href="/form-rapot">addnilai</a>
<br>
<br>
<a href="{{route('tes')}}">user</a>
<a href="{{url('login')}}">login</a>
<a href="regis">regis</a>
<a href="logout">logout</a>
<p>session flash : {{session('msg')}}</p>