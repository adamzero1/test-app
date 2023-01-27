<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegister as UserRegisterRequest;
use App\Http\Requests\UserLogin as UserLoginRequest;
use App\Models\User as UserModel;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Laravel\Sanctum\HasApiTokens;

class User extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        /** @var \Illuminate\Support\ValidatedInput $safe */
        $safeData = $request->safe()->all();

        // TODO create/send email verification

        $safeData['user']['password'] = Hash::make($safeData['user']['password']);
        $user = UserModel::create($safeData['user']);

        event(new Registered($user));

        // TODO
        // $token = $this->guard->login($user);

        /** @var HasApiTokens $user */
        $accessToken = $user->createToken('login-access-token', ['*'], Carbon::now()->addMinutes(60));
        $refreshToken = $user->createToken('login-refresh-token', ['refresh'], Carbon::now()->addMinutes(60));

        return [
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
        ];
    }

    public function login(
        UserLoginRequest $request,
        \Illuminate\Contracts\Auth\Guard $guard
    ){
        // TODO rate limit
        /** @var \Illuminate\Support\ValidatedInput $safe */
        $safeData = $request->safe()->all();

        /** @var \Illuminate\Auth\TokenGuard $guard */
        /** @var \Illuminate\Auth\EloquentUserProvider $provider */
        $provider = $guard->getProvider();

        $user = $provider->retrieveByCredentials([
            'email' => $safeData['user']['email']
        ]);
        $valid = false;
        if($user){
            echo 'password: '.$safeData['user']['password'].PHP_EOL;
            $valid = $provider->validateCredentials($user, [
                'password' => $safeData['user']['password']
            ]);
        }
        if(!$user || !$valid){
            throw new HttpResponseException(response()->json([
                'message' => 'Invalid authentication details',
            ]));
        }

        // vendor/laravel/fortify/src/Actions/EnableTwoFactorAuthentication.php

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
