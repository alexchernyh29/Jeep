<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function index()
    {
        $data['user'] = User::all();
        return view('home',$data);
    }

    public function create()
    {
        return view('user.create');
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
