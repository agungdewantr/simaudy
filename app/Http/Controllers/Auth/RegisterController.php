<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/login';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //   $scanKTP = $data['scan_KTP']->getClientOriginalName();
    //   $scanKTP1 = $data['scan_KTP'];
    //   $scanKTP1 = $scanKTP1->file('scan_KTP');
    //   dd($scanKTP1);
    //   $data->file("$data[scan_KTP]")->move('public/img/',$scanKTP);
    //     return User::create([
    //         'name' => $data['name'],
    //         'alamat' => $data['alamat'],
    //         'id_role' => $data['id_role'],
    //         'no_telp' => $data['no_telp'],
    //         'tempat_lahir' => $data['tempat_lahir'],
    //         'tanggal_lahir' => $data['tanggal_lahir'],
    //         'jenis_kelamin' => $data['jenis_kelamin'],
    //         'scan_KTP' => $scanKTP,
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function store(Request $request)
    {
      DB::table('users')->insert(
        ['id_role' =>'4',
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'scan_KTP' => 'wkwk',
        'created_at' => date('Y-m-d h:i:s')]
      );
    }
}
