<?php

namespace App\Models;

use App\Models\Role;
use http\Env\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\Self_;
use phpDocumentor\Reflection\Types\True_;
use Ramsey\Uuid\Type\Integer;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //relaciones
    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }
    public function permissions(){
        return $this->belongsToMany('App\Models\Permission')->withTimestamps();
    }
    public function boards(){
        return $this->belongsToMany(Board::class);
    }
    public function chats()
    {
        return $this->belongsToMany('App\Models\Chat');
    }
    public function messages() {
        return $this->hasMany('App\Models\Message');
    }
    public function models() {
        return $this->hasMany('App\Models\Modelo');
    }

    //almacenamiento
    public function store($request){
        $profile_path = 'images/avatar/avatar-'.random_int(1,5).'.png';
        $user = self::create($request->all());
        $user->update(['profile_path' => $profile_path]) ;
        $user->update(['password'=>Hash::make($request->password)]);

        $roles = [$request->role];
        $user->role_assignment(null,$roles);
        return $user;
    }
    public function my_update($request){
        self::update($request->all());
    }
    public function role_assignment($request ,array $roles = null){
        $roles = (is_null($roles)) ? $request->roles : $roles;
        $this->permission_mass_assignment($roles);
        $this->roles()->sync($roles);
        $this->verify_permission_integrity($roles);
    }

    public function is_admin()
    {
        $admin = config('app.admin_role');
        if ($this->has_role($admin)){
            return true;
        }else{
            return false;
        }
    }
    public function is_invitado()
    {
        $invitado = config('app.invitado_role');
        if ($this->has_role($invitado)){
            return true;
        }else{
            return false;
        }
    }
    public function is_anfitrion()
    {
        $anfitrion = config('app.anfitrion_role');
        if ($this->has_role($anfitrion)){
            return true;
        }else{
            return false;
        }
    }

    public function has_role($id)
    {
        $flag =false;
        foreach ($this->roles as $role){
            if ($role->id == $id || $role->slug == $id ){
                $flag = true;
            }
        }
        return $flag;
    }

    public function has_permission($id)
    {
        $flag=false;
        foreach ($this->permissions as $permission){
            if ($permission->id == $id || $permission->slug == $id){
                $flag = true;
            }
        }
        return $flag;
    }
    public function has_board($id){
        $flag = false;
        foreach ($this->boards as $board){
            if ($board->id == $id) $flag = true;
        }
        return $flag;
    }
    public function visible_users(){
        $users = self::all();
        if ($this->has_role(config('app.admin_role'))) {
            $users = self::all();
        }elseif ($this->has_role(config('app.secretary_role'))) {
            $users = Self::whereHas('roles',function ($q){
                $q->whereIn('slug',[
                    config('app.doctor_role'),
                    config('app.patient_role'),
                ]);
            })->get();
        }elseif ($this->has_role(config('app.doctor_role'))) {
            $users = Self::whereHas('roles',function ($q){
                $q->whereIn('slug',[
                    config('app.patient_role'),
                ]);
            })->get();
        }
        return $users;
    }
    public function visible_roles(){
        $roles=Role::all();
        if ($this->has_role(config('app.admin_role'))) $roles=Role::all();
        if ($this->has_any_role([config('app.secretary_role'), config('app.doctor_role')]) ){
            $roles = Role::where('slug',config('app.patient_role'))->
                            get();
        }
        return $roles;
    }
    public function has_any_role(array $roles): bool
    {
        foreach ($roles as $role){
            if ($this->has_role($role)) {
              return true;
            }
        }
        return false;
    }
    //otras opciones
    public function verify_permission_integrity(array $roles){
        $permissions = $this->permissions;
        foreach ($permissions as $permission){
            if (in_array($permission->role->id,$roles)){
                $this->permissions()->detach($permission->id);
            }
        }

    }
    public function permission_mass_assignment(array $roles){
        foreach ($roles as $role){
            if (!$this->has_role($role)){
                $role_obj = \App\Models\Role::findOrFail($role);
                $permissions = $role_obj->permissions;
                $this->permissions()->syncWithoutDetaching($permissions);
            }
        }
    }
    public function list_roles(){
        $roles = $this->roles->pluck('name')->toArray();
        $string =implode(',',$roles);
        return $string;
    }

    //vistas
    public function edit_view($view = null){
        $auth = auth()->user();
        if (!is_null($view) && $view == 'frontoffice'){
            return 'theme.frontoffice.pages.user.edit';
        }elseif ($auth->has_any_role([
            config('app.admin_role'),
            config('app.secretary_role')
        ])){
            return 'theme.backoffice.pages.user.edit';
        }else{
            return 'theme.frontoffice.pages.user.edit';
        }
    }
    public function user_show($view = null){
        $auth = auth()->user();
        if (!is_null($view) && $view == 'frontoffice'){
            return 'frontoffice.user.profile';
        }elseif ($auth->has_any_role([
            config('app.admin_role'),
            config('app.secretary_role')
        ])){
            return 'backoffice.user.show';
        }else{
            return 'frontoffice.user.profile';
        }
    }
    public function get_role_board($id,$board_id)
    {
        try {
            $res = DB::table('role_user')
                ->where('board_id','=',$board_id)
                ->where('user_id','=',$id)
                ->first();
            $role = Role::find($res->role_id);
        }catch (Exception $exception){
            return $exception;
        }
        return $role;
    }
    public function list_boards(){
        $boards= $this->boards->pluck('name')->toArray();
        $string = implode(',',$boards);
        return $string;
    }
}
