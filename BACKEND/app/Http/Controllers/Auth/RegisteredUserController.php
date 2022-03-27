<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    protected $table= "szakember";
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:szakember'],
            'jelszo' => ['required', Rules\Password::defaults()],
        ]);
        
        //dd($request);

        $user = User::create([
            'nev' => $request->name,
            'email' => $request->email,
            'jelszo' => Hash::make($request->jelszo),
            'szerepkorID' => $request->szerepkorID
        ]);

        event(new Registered($user));

        //Auth::login($user);
        header("Refresh:0");

        //return redirect(RouteServiceProvider::HOME);
    }
}
