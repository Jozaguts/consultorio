<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role_or_permission:Admin|users index|users show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json(['users', $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserStoreRequest $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        try {
            $user = User::create([
                'first_name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'consulting_room_id' => $request->consulting_room_id,
                'password' => bcrypt($request->password),
            ]);
            return response()->json(['success' => 'Usuario registrado', 'user' => $user], 201);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::find($id);
            return response()->json(['user' => $user]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $user = User::find($id);
            $inputs =  array_filter($request->all());
            $user->update(Arr::has($inputs, 'password')
                ? array_merge($request->except('password'), ['password' => bcrypt($request->input('password'))])
                : $request->except('password'));
            return response()->json(['success' => 'usuario actualizado', 'user' => $user], 200);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return response()->json(['success' => "Usuario {$user->name} ha sido eliminado"], 200);
        } catch (\Throwable $th) {
           return response()->json(['errors' => $th->getMessage()]);
        }
    }
}
