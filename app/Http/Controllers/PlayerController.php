<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\players;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Exception; 
use Illuminate\Database\QueryException; 

class PlayerController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:players,email',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user = players::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);
            return response()->json([
                'token' => $user->createToken($request->device_name ?? 'default_device')->plainTextToken,
                'message' => 'User registered successfully',
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation error',
                'messages' => $e->errors()
            ], 422);

        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Database error',
                'message' => $e->getMessage()
            ], 500); 

        } catch (Exception $e) {
            // Cualquier otro error
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500); 
        }
    }

    public function login(): JsonResponse
    {
        try {
            request()->validate([
                'email' => 'required|email',
                'password' => 'required',
                'device_name' => 'required'
            ]);
            $user = players::where('email', request()->email)->first();

            // Verificar las credenciales
            if (!$user || !Hash::check(request()->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
            return response()->json([
                'token' => $user->createToken(request()->device_name)->plainTextToken
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation error',
                'messages' => $e->errors()
            ], 422);

        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Database error',
                'message' => $e->getMessage()
            ], 500);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function logout(): JsonResponse
    {
        try {
            auth()->user()->tokens()->delete();
            return response()->json([
                'message' => 'Logged out successfully'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
