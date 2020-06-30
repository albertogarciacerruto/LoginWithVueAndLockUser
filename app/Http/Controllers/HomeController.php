<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //Se listan los usuarios - no se usa en la solucion actual
    public function index()
    {
        $users = User::paginate(10);
        return view('home', compact('users'));
    }
    //Metodo que lista todos los usuarios para ser llamado por el JS de VUE
    public function lists()
    {
        $users = User::get();
        return response()->json([
            'users' => $users
        ]);
    }
    //Metodo que permite cambiar el estatus de los usuarios
    public function unlock_user($id_user)
    {
        $user = \DB::table('users')->where('id', '=', $id_user)->first();
        \DB::table('users')->where('id', '=', $user->id)->update(['active' => 'manual']);
        return redirect('home');
    }

}
