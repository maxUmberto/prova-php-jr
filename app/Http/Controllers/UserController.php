<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\User;

class UserController extends Controller
{

    private $objUser;
    private $objRole;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objRole = new Role();
    }

    public function index()
    {
        $users = $this->objUser->orderBy('updated_at', 'DESC')->paginate(5);
        return view('index', compact('users'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(UserRequest $request)
    {
        //Since we three fields in the birthday instead of using a datepicker, we need to check wheter the date is valid or note
        //So we concate the birthday fields and add it to the rules to be checked
        //But I didnt find a way to translate the message showed to the user, so its in english unfortunately
        $this->dateIsValid($request);

        $newUser = $this->objUser->create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'birthday' => $request->year . '-' . $request->month . '-' . $request->day,
            'phone' => $request->phone,
            'address' => $request->address . ', ' . $request->address_number,
            'uf' => $request->address_uf,
            'city' => $request->address_city,
        ]);

        //In case there wasnt any roles selected to the user
        if ($newUser && $request->roles) {
            $roles = $this->defineRoles($request->roles);
            $newRole = $this->objRole->create([
                'user_id' => $newUser->id,
                'client' => $roles['client'],
                'employee' => $roles['employee'],
                'admin' => $roles['admin'],
            ]);
        }

        if ($newUser) {
            return redirect('/users')->withSuccess('Usuário cadastrado com sucesso');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = $this->objUser->find($id);
        $roles = $this->objRole->where('user_id', [$user->id])->get();

        return view('form', compact('user', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {
        //Since we three fields in the birthday instead of using a datepicker, we need to check wheter the date is valid or note
        //So we concate the birthday fields and add it to the rules to be checked
        //But I didnt find a way to translate the message showed to the user, so its in english unfortunately
        $this->dateIsValid($request);

        $user = $this->objUser->where(['id' => $id])->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'birthday' => $request->year . '-' . $request->month . '-' . $request->day,
            'phone' => $request->phone,
            'address' => $request->address . ', ' . $request->address_number,
            'uf' => $request->address_uf,
            'city' => $request->address_city,
        ]);

        //In case there wasnt any roles selected to the user
        if ($user && $request->roles) {
            $roles = $this->defineRoles($request->roles);
            $role = $this->objRole->where(['user_id' => $id])->update([
                'client' => $roles['client'],
                'employee' => $roles['employee'],
                'admin' => $roles['admin'],
            ]);
        }

        if ($user) {
            return redirect('/users')->withSuccess('Usuário atualizado com sucesso');
        }
    }

    public function destroy($id)
    {
        $delete = $this->objUser->destroy($id);
        session()->flash('success', 'Usuário excluído com sucesso');
//            return($delete) ? "Sim" : "Não";
            return($delete) ? "Sim" : "Não";
    }

    public function search(Request $request){
        $name = $request->name;
        $cpf = $request->cpf;
        if($request->name != '' || $request->cpf != ''){
            $users = $this->objUser->where([['name', 'LIKE', "%$request->name%"],['cpf', 'LIKE', "%$request->cpf%"]])->paginate(5);
            return view('index', compact('users', 'name', 'cpf'));
        }
        else{
            return redirect('/users');
        }
    }

    private function dateIsValid($request){
        $request->merge([
            'birthday_date' => $request->year . '-' . $request->month . '-' . $request->day,
        ]);
        $this->validate($request, [
            'birthday_date' => 'date',
        ]);
    }

    private function defineRoles($requestRoles)
    {
        $roles = [
            'client' => 0,
            'employee' => 0,
            'admin' => 0,
        ];

        foreach ($requestRoles as $role) {
            if ($role == 1)
                $roles['client'] = 1;
            if ($role == 2)
                $roles['employee'] = 1;
            if ($role == 3)
                $roles['admin'] = 1;
        }

        return $roles;
    }
}
