@if($errors->first('name'))
    <div class="alert alert-danger"> {{$errors->first('name')}}</div>
@endif
<form method="post" action="{{url('admin/manufacturers')}}">
    {{csrf_field()}}
    <label>Title</label>
    <input type="text" name="name">
    <input type="submit">
</form>
