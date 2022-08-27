<?php
    
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $params = $request->all();
        $user = DB::table('user')
            ->select('id', 'email', 'password', 'name')
            ->where([
                ['email', '=', $params['email']]
            ])->get()->first();
        if($user && Hash::check($params['password'], $user->password)){
            return response()->json([
                'success' => true, 
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]
            ]);
        }
        return respose()->json([
            'success' => false,
            'error' => 'Usuário não encontrado'
        ]);
    }
}
