<select name="department" id="department" class="form-control js-example-theme-single">
    <option selected disabled>--Select department--</option>
    @foreach($departments as $depart)
        <option value="{{$depart->id}}">{{$depart->department_name ?? '' }}</option>
    @endforeach
</select>
@error('department') <i class="text-danger">{{$message}}</i> @enderror
