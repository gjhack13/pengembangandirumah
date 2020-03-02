<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) { //fungsi dari form pencarian data slide gambar atas
            $data_pegawai = \App\Pegawai::where('judul_image', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_pegawai = \App\Pegawai::all();
        }
        return view('pegawai.index', ['data_pegawai' => $data_pegawai]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'judul_image' => 'min:5'
        ]);
        //insert ke tabel user
        $user = new \App\User;
        $user->role = 'pegawai';
        $user->name = $request->judul_image;
        $user->email = $request->email;
        $user->password = bcrypt('adminbpippusdatin081994');
        $user->remember_token = \Str::random(90);
        $user->save();
        //insert ketabel pegawai

    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $pegawai = \App\Pegawai::find($id);
        $pegawai->update($request->all());
        if ($request->hasFile('image')){
            $request->file('image')->move('image/', $request->file('image')->getClientOriginalName());
            $pegawai->image = $request->file('image')->getClientOriginalName();
            $pegawai->save();
        }
        return redirect ('/pegawai')->with('sukses', 'Data telah berhasil dihapus');
    }

    public function delete($id)
    {
        $pegawai = \App\Pegawai::find($id);
        $pegawai->delete($pegawai);
        return redirect('/pegawai')->with('sukses', 'Data telah berhasil dihapus');
    }

    public function profile($id)
    {
        $pegawai = \App\Pegawai::find($id);
        return view('pegawai.profile', ['pegawai' => $pegawai]);
    }

}
