<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/store",
     *     summary="Criar um novo usuário",
     *     tags={"Usuários"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="email", type="string"),
     *                 @OA\Property(property="password", type="string"),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuário criado com sucesso",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Dados incorretos",
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $validate = true;

        if (!isset($request->name) || $request->name == null || $request->name == '') {
            $validate = false;
        }

        if (!isset($request->email) || $request->email == null || $request->email == '') {
            $validate = false;
        }

        if (!isset($request->password) || $request->password == null || $request->password == '') {
            $validate = false;
        }

        if ($validate == true) {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            return response()->json($user, 201);
        } else {
            return response()->json('Dados incorretos!', 400);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/index",
     *     summary="Obter todos os usuários",
     *     tags={"Usuários"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de usuários",
     *     ),
     * )
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * @OA\Get(
     *     path="/api/show/{id}",
     *     summary="Obter um usuário específico",
     *     tags={"Usuários"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do usuário",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalhes do usuário",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuário não encontrado",
     *     ),
     * )
     */
    public function show($id)
    {
        $users = User::findOrFail($id);

        return response()->json($users);
    }
}
