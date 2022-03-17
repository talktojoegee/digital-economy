<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAdminNotifications(){
        return $this->hasMany(AdminNotification::class, 'user_id')->orderBy('id', 'DESC');
    }
    public function getUnreadAdminNotifications(){
        return $this->hasMany(AdminNotification::class, 'user_id')->where('is_read', 0)->count();
    }



    public function getDepartment(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function getUserEmergencyContacts(){
        return $this->hasMany(UserEmergencyContact::class, 'user_id')->orderBy('full_name', 'ASC');
    }

    public function getJobRole(){
        return $this->belongsTo(JobRole::class, 'job_role_id');
    }
     public function getLocalGovernment(){
            return $this->belongsTo(LocalGovernment::class, 'local_gov_id');
    }

    public function getState(){
            return $this->belongsTo(State::class, 'state_id');
    }

    public function getGradeLevel(){
            return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    public function getMaritalStatus(){
            return $this->belongsTo(MaritalStatus::class, 'marital_status');
    }




    /*
     * Use-case methods
    */

    public function getAllEmployees(){
        return User::orderBy('first_name', 'ASC')->get();
    }
    public function getAllActiveEmployees(){
        return User::where('account_status',1)->orderBy('first_name', 'ASC')->get();
    }

    public function setNewEmployee(Request $request){
        $password = 'password123';
        $employee = new User();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->surname ;
        $employee->other_names = $request->other_names ?? '';
        $employee->email = $request->email ?? '';
        $employee->password = bcrypt($password);
        $employee->mobile_no = $request->mobile_no ?? '';
        $employee->state_id = $request->state;
        $employee->local_gov_id = $request->local_gov;
        $employee->birth_date = $request->birth_date ?? '';
        $employee->hire_date = $request->hire_date ?? '';
        $employee->job_role_id = $request->job_role;
        $employee->department_id = $request->department;
        $employee->address = $request->address ?? '';
        $employee->gender = $request->gender ?? '';
        $employee->grade_level_id = $request->grade_level ?? '';
        $employee->marital_status = $request->marital_status ?? '';
        $employee->employee_id = $request->employee_id ?? '';
        $employee->slug = Str::slug($request->first_name).'-'.substr(sha1(time()),27,40);
        $employee->save();
    }

    public function updateEmployeeProfile(Request $request){
        $employee = User::find($request->user);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->surname ;
        $employee->other_names = $request->other_names ?? '';
        $employee->email = $request->email ?? '';
        $employee->mobile_no = $request->mobile_no ?? '';
        $employee->state_id = $request->state;
        $employee->local_gov_id = $request->local_gov;
        $employee->birth_date = $request->birth_date ?? '';
        $employee->hire_date = $request->hire_date ?? '';
        $employee->job_role_id = $request->job_role;
        $employee->department_id = $request->department;
        $employee->address = $request->address ?? '';
        $employee->gender = $request->gender ?? '';
        $employee->grade_level_id = $request->grade_level ?? '';
        $employee->marital_status = $request->marital_status ?? '';
        $employee->employee_id = $request->employee_id ?? '';
        $employee->slug = Str::slug($request->first_name).'-'.substr(sha1(time()),27,40);
        $employee->save();
    }

    public function getEmployeeBySlug($slug){
        return User::where('slug', $slug)->first();
    }

    public function getEmployeeById($id){
        return User::find($id);
    }

    public function getEmployeesByDepartmentId($id){
        return User::where('department_id', $id)->orderBy('first_name', 'ASC')->get();
    }

    public function getUserByEmail($email){
        return User::where('email', $email)->first();
    }

}
