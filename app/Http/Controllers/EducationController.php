<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\About;
use App\Models\project;
class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education= education::orderBy ('id','desc')->get();
        return view('education.index')->with('education',$education);
    }



    public function tampil(){
        return view('home.index', [
            'education' => education::orderBy ('id','desc')->get(),
            'Experience' => Experience::orderBy ('id','desc')->get(),
            'Skill' => Skill::orderBy ('id','desc')->get(),
            'About'=> About::orderBy ('id','desc')->get(),
            'project'=> project::orderBy ('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('desc', $request->desc);
  
       $request->validate([
           'judul' => 'required',
           'desc' => 'required',
           'foto' => 'image|file|max:10000',
          
       ], [
           'judul.required' => 'judul wajib diisi',
           'desc.required' => 'descripsi wajib diisi',
       ]); 

       $foto_file = $request->file('foto');
       $foto_ekstensi = $foto_file->extension();
       $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
       $foto_file->move(public_path('foto'), $foto_nama);


       $education = [
           'judul' => $request->input('judul'),
           'desc' => $request->input('desc'),
           'foto' => $foto_nama
       ];

   
       education::create($education);
       return redirect()->to('education')->with('success', 'Berhasil menambahkan data education');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = education::where('id', $id)->first();
        return view('education.edit')->with('education', $education);
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
            'judul' => 'required',
            'desc' => 'required',
        ], [
            'judul.required' => 'judul wajib diisi',
            'desc.required' => 'descripsi wajib diisi',
        ]);
        $education = [
            'judul' => $request->judul,
            'desc' => $request->desc,
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

        $data_foto = education::where('id', $id)->first();
    File::delete(public_path('foto') . '/' . $data_foto->foto);

        $education =[
            'judul' => $request->judul,
            'desc' => $request->desc,
                'foto'=>$foto_nama
        ];
        }
        education::where('id', $id)->update($education);
        return redirect()->to('education')->with('success', 'Berhasil mengubah Data Education');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_foto = education::where('id', $id)->first();
        File::delete(public_path('foto') . '/' . $data_foto->foto);
    
    
            education::where('id', $id)->delete();
            return redirect()->to('education')->with('success', 'Berhasil menghapus  education');
    }
}
