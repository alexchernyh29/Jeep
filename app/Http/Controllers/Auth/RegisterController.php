<?php

namespace App\Http\Controllers\Auth;

use     App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'car' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'car' => $data['car'],
            'link' => $data['link'],
            'number' => $data['number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name'=> 'required',
            'car'=> 'required',
            'link'=> 'required',
            'number'=> 'required',
        ]);
        if ($validator->fails()) {
            return redirect((route('user.create')))->withInput();
        } else {
            $newUser = [
                'name' => $input['name'],
                'car' => $input['car'],
                'link' => $input['link'],
                'number' => $input['number'],
            ];
            User::create($newUser);
            return redirect(route('user.index'));
        } // else if ($validator->fails())
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return redirect(route('home.index'));
        } else {
            $data['user'] = $user;
            return view('user', $data);
        } // else if (is_null($news))
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name'=> 'required',
            'car'=> 'required',
            'link'=> 'required',
            'number'=> 'required',
        ]);

        if ($validator->fails()) {
            request()->session('Не введены все неоходимые данные');
            return redirect((route('user', ['id' => $input['id']])))->withInput();
        } else {
            $one_user = User::find($input['id']);
            $one_user->fill($input)->save();
            return redirect(route('home.index'));
        } // else  if ($validator->fails())
    }

}
