<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     * register a new user acc
     */
    public function register(RegisterRequest $request)
    {
        // assign the validated request data to a new instance of the User model
        $user = User::create(
            ['username' => $request['username'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]
        );
        $token = $user->createToken('my-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'Type' => 'Bearer'
        ]);
    }

    /**
     * @param LoginRequest $request
     * @return Application|ResponseFactory|JsonResponse|Response
     * login with username and pass
     */
    public function login(LoginRequest $request)
    {
        $user = $this->userService->findByUserName($request->username);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Wrong credentials'
            ]);
        }

        $token = $user->createToken('my-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'Type' => 'Bearer',
        ]);
    }
}
