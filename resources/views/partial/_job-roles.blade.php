<select name="job_role" id="job-role" class="form-control js-example-theme-single">
    <option selected disabled>--Select job role--</option>
    @foreach($job_roles as $role)
        <option value="{{$role->id}}">{{$role->role_name ?? '' }}</option>
    @endforeach
</select>

