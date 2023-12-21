<!-- Simplicity is an acquired taste. - Katharine Gerould -->
<h1>add nilai {{session()->get('id')}}</h1>

<form action="{{$action}}" method="post">
    @csrf
    <input type="hidden" name="fk_user" value="{{session()->get('id')}}">
    <label for="mk">mk</label>
    <input type="text" name="mk" id="mk" value="{{isset($data)?$data->mk:''}}"><br>
    <label for="nilai">nilai</label>
    <input type="number" name="nilai" id="nilai" value="{{isset($data)?$data->nilai:''}}"><br>
    <input type="submit" value="submit">
</form>
<a href="/rapot">rapot</a>
<a href="/form-rapot">addnilai</a>
<p>session flash : {{session('msg')}}</p>