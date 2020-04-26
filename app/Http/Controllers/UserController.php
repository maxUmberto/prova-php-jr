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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->objUser->paginate(5);
        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $newUser = $this->objUser->create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'birthday' => $request->year . '-' . $request->month . '-' . $request->day,
            'phone' => $request->phone,
            'address' => $request->address . ', ' . $request->address_number,
            'uf' => $request->address_uf,
            'city' => $request->address_city,
        ]);

        //In case there wasnt no roles selected to the user
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
            return redirect('/users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->objUser->find($id);
        $roles = $this->objRole->where('user_id', [$user->id])->get();
//        dd($roles[0]);

        return view('form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
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
            return redirect('/users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->objUser->destroy($id);
            return($delete) ? "Sim" : "Não";
    }

    public function search(UserRequest $request){
        if($request->name != '' || $request->cpf != ''){
//            dd($request->name);
            $users = $this->objUser->where([['name', 'LIKE', "%$request->name%"],['cpf', 'LIKE', "%$request->cpf%"]])->get();
//            dd($users);
            return view('index', compact('users'));
        }
        else{
            return redirect('/users');
        }
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
