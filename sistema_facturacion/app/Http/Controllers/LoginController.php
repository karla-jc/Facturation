<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->only(['showLogin', 'showRegister']);
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register')
            ->with('name', 'Formulario de Registro')
            ->with('isAdmin', false);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->role->nombre === "admin"){
                return redirect('/admin')->with('success', 'Sesion iniciada correctamente.');
            }else{
                return redirect('/')->with('success', 'Sesion iniciada correctamente.');
            }
        }

        return redirect('/login')->with('error', 'Las crendeciales son incorrectas.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns|required|unique:accounts',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);


        if($validated){
            $role = Role::where('nombre','facturador')->first();

            if($role)
            {
                $account = new Account;
                $account->name = $request->name;
                $account->email = $request->email;
                $account->estado = true;
                $account->password = Hash::make($request->password);
                if ($request->role) {
                    $account->role_id = $request->role;
                }else {
                    $account->role_id = $role->id_role;
                }


                if($account->save()){
                    if ($request->role) {
                        return redirect('/admin/users')->with('success', 'La cuenta ha sido generada exitosamente.');
                    }
                    return redirect('/login')->with('success', 'La cuenta ha sido generada exitosamente. Inicie sesión para continuar.');
                }

                return back()->with('error', 'Ha ocurrido un error al guardar los datos.');

            }

            return back()->with('error', 'No existen roles en el sistema.');
        }

        return redirect()->back()->withErrors($validated)->withInput();
    }
   

    
}
