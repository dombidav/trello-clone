<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Utils\ResponseCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function __construct() {
       $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(LoginRequest $request): JsonResponse {
        $token = auth()->attempt($request->validated());
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], ResponseCodes::UNAUTHORIZED);
        }
        return $this->createNewToken($token);
    }


    public function register(StoreUserRequest $request, UserController $userController) {
       return  $userController->store($request);
    }


    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    function userProfile() {
        return response()->json(auth()->user());
    }

    protected function createNewToken($token){
        return response()->json([
                                    'access_token' => $token,
                                    'token_type' => 'bearer',
                                    'expires_in' => auth()->factory()->getTTL() * 60,
                                    'user' => auth()->user()
                                ]);
    }
}
