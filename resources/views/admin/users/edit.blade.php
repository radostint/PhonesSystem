<form method="post" action="{{action('Admin\UsersController@update', $id)}}">
    <div class="form-group row">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name"
                   value="{{$user->name}}">
        </div>
    </div>
    <div class="form-group row">
        <input name="_method" type="hidden" value="PATCH">
        <label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Administrator: </label>
        <select name="isAdmin" class="form-control" required>
            <option value="0" selected="selected">False</option>
            <option value="1">True</option>
        </select>
    </div>
    <div class="form-group row">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Email</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="email"
                   name="email" value="{{$user->email}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
