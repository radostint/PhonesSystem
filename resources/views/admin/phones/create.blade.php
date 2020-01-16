@if($errors->first('name'))
    <div class="alert alert-danger"> {{$errors->first('name')}}</div>
@endif
<form method="post" action="{{url('phones')}}">
    {{csrf_field()}}
    <label>Title</label>
    <input type="text" name="model">
    <input type="number" name="year">
    <input type="submit">
</form>
