@if($errors->first('name'))
    <div class="alert alert-danger"> {{$errors->first('name')}}</div>
@endif
<form method="post" action="{{url('phones')}}">
    {{csrf_field()}}
    <label>Model</label>
    <input type="text" name="model">
    <label>Year</label>
    <input type="number" name="year">
    <label>Manufacturer</label>
    <select name="manufacturerId" class="form-control" required>
        <option value=""> -- Select One --</option>
        @foreach($manufacturers as $manufacturer)
            <option value="{{ $manufacturer->id }}">
                {{ $manufacturer->name }}
            </option>
        @endforeach
    </select>
    <input type="submit">
</form>

