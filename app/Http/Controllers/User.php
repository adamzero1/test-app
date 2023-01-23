<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegister as UserRegisterRequest;
use App\Http\Requests\UserLogin as UserLoginRequest;
use App\Models\User as UserModel;

class User extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        /** @var \Illuminate\Support\ValidatedInput $safe */
        $safeData = $request->safe()->all();

        // TODO create email verification

        return UserModel::create($safeData['user']);
    }

    public function login(UserLoginRequest $request)
    {
        /** @var \Illuminate\Support\ValidatedInput $safe */
        $safeData = $request->safe()->all();

        // check if email exists

        // check if password is valid

        // check if mfa is valid

        // if not email verified?

        // if not mfa added

        return [
            'user' => $safeData['user'],
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
