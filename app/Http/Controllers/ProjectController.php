<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project= project::orderBy ('id','desc')->get();
        return view('project.index')->with('project',$project);
    }

    public function project(){   
        $project= project::orderBy ('id','desc')->get();
        return view('TampilProject.index')->with('project',$project);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return  view('project.create');
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


        $project = [
            'judul' => $request->input('judul'),
            'desc' => $request->input('desc'),
            'foto' => $foto_nama
        ];

    
        project::create($project);
        return redirect()->to('project')->with('success', 'Berhasil menambahkan project');
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
        $project = project::where('id', $id)->first();
        return view('project.edit')->with('project', $project);
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
        $project = [
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

        $data_foto = project::where('id', $id)->first();
    File::delete(public_path('foto') . '/' . $data_foto->foto);

        $project =[
            'judul' => $request->judul,
            'desc' => $request->desc,
                'foto'=>$foto_nama
        ];
        }
        project::where('id', $id)->update($project);
        return redirect()->to('project')->with('success', 'Berhasil mengubah Skil');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_foto = project::where('id', $id)->first();
    File::delete(public_path('foto') . '/' . $data_foto->foto);


        project::where('id', $id)->delete();
        return redirect()->to('project')->with('success', 'Berhasil menghapus  project');
    }
}
