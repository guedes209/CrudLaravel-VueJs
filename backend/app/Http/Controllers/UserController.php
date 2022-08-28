<?php
    
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $cookie = Cookie::make('testcookie','5', 120);
        $params = $request->all();
        $user = DB::table('user')
            ->select('id', 'email', 'password', 'name')
            ->where([
                ['email', '=', $params['email']]
            ])->get()->first();
        if($user && Hash::check($params['password'], $user->password)){
            $request->session()->put('personId', $user->id);
            return response()->json([
                'success' => true, 
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'session' => $request->session()->all()
                ]
            ])->withCookie($cookie);
        }
        return respose()->json([
            'success' => false,
            'error' => 'Usuário não encontrado'
        ]);
    }

    public function createUser(Request $request)
    {
        $params = $request->all();
        $user = User::create([
            'email' => $params['email'],
            'password' => Hash::make($params['password'])
        ]);
        if($user){
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'success' => false, 
                'error' => 'Não foi possível criar o usuário'
            ]);
        }
    }

    public function logged(Request $request)
    {
        $cookie = Cookie::get('testcookie');
        var_dump($cookie);
        if($request->hasSession()){
            if($request->session()->get('personId')){
                return response()->json([
                    'success' => true,
                    'logged' => true,
                    'session' => $request->session()->all(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'logged' => false,
                    'session' => $request->session()->all(),
                ]);
            }
        }else {
            return response()->json([
                'success' => false,
                'logged' => false
            ]);
        }
    }
}
