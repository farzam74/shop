<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except' => ['login','register']]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8']]);

        if($validator->fails())
        {
            return response()->json($validator->errors()->toJson(),422);
        }

        if (! $token= Auth::guard('api')->attempt($validator->validated()))
        {
            return response()->json(['error' => 'unauthorized'],401);
        }

        return $this->createNewToken($token);
    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required','regex:/^(\+98|0)?9\d{9}$/','unique:users']
        ]);

        if ($validator -> fails())
        {
            return response()->json($validator->errors()->toJson(),400);
        }

        $user=array_merge($validator->validated(),['password' => Hash::make($request->password)]);

        $user=User::create($user);

        return response()->json([
                'message' => 'You are registered successfully.',
                'user' => $user
            ],201);

    }




    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
            'message' => 'You are signed out successfully.'
        ],200);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(Auth::guard('api')->user());
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(Auth::guard('api')->refresh());
    }


    /**
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
        ]);
    }
}
