<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Skill;
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Skill= Skill::orderBy ('id','desc')->get();
        return view('skill.index')->with('Skill',$Skill);
    }

//     public function nampil(){
//   return view('aboutMe.index', [
//             'Skill' => Skill::orderBy ('id','desc')->get(),
//         ]);
//     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
   
        $request->validate([
            'nama' => 'required',
            'foto' => 'image|file|max:10000',
           
        ], [
            'nama.required' => 'Nama wajib diisi',
        ]); 

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);


        $Skill = [
            'nama' => $request->input('nama'),
            'foto' => $foto_nama
        ];

    
        Skill::create($Skill);
        return redirect()->to('skill')->with('success', 'Berhasil menambahkan Skill');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Skill = Skill::where('id', $id)->first();
        return view('skill.edit')->with('Skill', $Skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
           

        ], [
            'nama.required' => 'nama wajib diisi',
        ]);
        $Skill = [
            'nama' => $request->nama,
        ];
        if($request->hasFile=('foto')){
            $request->validate([
                'foto' => 'image|file|max:10000',
            ],[
                'foto.required' => 'Foto wajib diisi',
            ]);
            
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data_foto = Skill::where('id', $id)->first();
    File::delete(public_path('foto') . '/' . $data_foto->foto);

        $Skill =[
            'nama' => $request->nama,
                'foto'=>$foto_nama
        ];
        }
        Skill::where('id', $id)->update($Skill);
        return redirect()->to('skill')->with('success', 'Berhasil mengubah Skil');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          
        $data_foto = Skill::where('id', $id)->first();
    File::delete(public_path('foto') . '/' . $data_foto->foto);


        Skill::where('id', $id)->delete();
        return redirect()->to('skill')->with('success', 'Berhasil menghapus  Skill');
    }
}
