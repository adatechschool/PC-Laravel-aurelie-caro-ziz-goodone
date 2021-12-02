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
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'biography' => ['required', 'string', 'max:255'],
            'img_profil' => ['required','string', 'max:5048']


        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function update(Request $request)
{
    // $newPhoto = time() . '-' . $request->name . '.' .
    // $request->img_profil->extension();

    // $request->img_profil->move(storage_path('app/public/photos'), $newPhoto);
    $path=$request->file('img_profil')->store('public/photos');
    $url = Storage::url($path);

    // dd($url);
    $values = $request->only(['name', 'email', 'biography', 'img_profil']);
    $values['img_profil'] = $url;
    $rules = [
        'name' => 'required|max:255|unique:users,name,' . $request->user()->id,
        'email' => 'required|email|max:255|unique:users,email,' . $request->user()->id,
        'biography' => 'required|max:255|unique:users,biography,' . $request->user()->id,
        'img_profil' => 'required|image|unique:users,img_profil,' . $request->user()->id,
    ];
    
    
    if($request->password) {
        $rules['password'] = 'string|confirmed|min:8';
        $values['password'] =  Hash::make($request->password);
    }
    $request->validate($rules);
    $request->user()->update($values);
    
    // return $url;
    return back()->with('status', __('You have been successfully updated.'. print_r($request->all(), true)));
}
}
