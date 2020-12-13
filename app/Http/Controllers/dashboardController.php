<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\jenispaket;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\tempatlaundry;

class dashboardController extends Controller
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

    public function landingpage(){
      $tempat_laundry = tempatlaundry::all();
      return view('landingpage', compact('tempat_laundry'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      if (auth()->user()->id_role == '4') {
        $tempat_laundry = tempatlaundry::all();
        return view('dashboardpelanggan', compact('tempat_laundry'));
      } else {
        return view('dashboard');
      }

    }


    public function tentangkami()
    {
      $namalaundry = tempatlaundry::select('nama_tempat_laundry')->where('id_tempat_laundry', auth()->user()->id_tempat_laundry)->first();
      $jenispaket = jenispaket::all();
      return view('tentangkami', compact('jenispaket', 'namalaundry'));
    }

    public function tentanglaundry($id)
    {
      $namalaundry = tempatlaundry::select('nama_tempat_laundry')->where('id_tempat_laundry', $id)->first();
      $jenispaket = jenispaket::all();
      return view('tentangkami', compact('jenispaket', 'namalaundry'));
    }

    public function profile(){
      return view('profil');
    }

    public function editprofile(){
      return view('editprofil');
    }

    public function updateprofile(Request $request){
      if ($request->email == auth()->user()->email) {
        $email =  'required';
      } else {
        $email =  'required|unique:users';
      }
      $request->validate([
        'email' => $email,
        'name' => 'required',
        'password' =>'required|confirmed',
        'password_confirmation' =>'required',
        'no_telp' => 'required',
        'alamat' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'scan_KTP' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);
      if ($request->scan_KTP != NULL) {
          $scanKTP = $request->scan_KTP;
          $scanKTP = date('Y-m-d-h-i-s').$scanKTP->getClientOriginalName();
          $request->file('scan_KTP')->move('storage/img',$scanKTP);
      } else {
        $scanKTP = auth()->user()->scan_KTP;
      }

      User::where('id', $request->id )
      ->update([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'no_telp' => $request->no_telp,
      'alamat' => $request->alamat,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'jenis_kelamin' => $request->jenis_kelamin,
      'scan_KTP' => $scanKTP,
      'updated_at' => date('Y-m-d h:i:s')]
    );
      return redirect('/profile')->with('status','Data profil anda Berhasil Diupdate');
    }

    public function profillaundry(){
      $detaillaundry = tempatlaundry::where('id_tempat_laundry', auth()->user()->id_tempat_laundry)->first();
      return view('profillaundry', compact('detaillaundry'));
    }

    public function editprofilelaundry(){
      $detaillaundry = tempatlaundry::where('id_tempat_laundry', auth()->user()->id_tempat_laundry)->first();
      return view('editprofillaundry', compact('detaillaundry'));
    }

    public function updateprofilelaundry(Request $request){
      $request->validate([
        'nama_tempat_laundry' => 'required',
        'alamat_laundry' => 'required',
        'tanggal_terbentuk' => 'required'
      ]);

      tempatlaundry::where('id_tempat_laundry',auth()->user()->id_tempat_laundry)
      ->update([
        'nama_tempat_laundry' =>$request->nama_tempat_laundry,
        'alamat_laundry' => $request->alamat_laundry,
        'tanggal_terbentuk' => $request->tanggal_terbentuk,
        'updated_at' => date('Y-m-d h:i:s')
      ]);
        return redirect('/profillaundry')->with('status','Data profil Laundry anda Berhasil Diupdate');
    }

    public function cari(Request $request){
      $cari = $request->cari;
      $cari_tempatlaundry = tempatlaundry::where('nama_tempat_laundry', 'like', '%' . $cari . '%')->get();
      $tempat_laundry = tempatlaundry::all();
      if (count($cari_tempatlaundry) == 0) {
        $cari_tempatlaundry = "Tempat laundry tidak ditemukan!";
      }
      return view('dashboardpelanggan', compact('cari_tempatlaundry','tempat_laundry'));
    }

}
