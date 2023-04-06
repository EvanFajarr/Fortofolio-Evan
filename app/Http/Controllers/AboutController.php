<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $About= About::orderBy ('id','desc')->get();
        return view('About.index')->with('About',$About);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('About.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('desc', $request->desc);
   
        $request->validate([
            'desc' => 'required',
            'foto' => 'image|file|max:10000',
           
        ], [
            'desc.required' => 'Nama desc wajib diisi',
        ]); 
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);


        $About = [
            'desc' => $request->input('desc'),
            'foto' => $foto_nama
        ];

    
        About::create($About);
        return redirect()->to('About')->with('success', 'Berhasil menambahkan About');
    
    
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
        $About = About::where('id', $id)->first();
        return view('About.edit')->with('About', $About);
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
            'desc' => 'required',

        ], [
            'desc.required' => ' description wajib diisi',
         
        ]);
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

        $data_foto = About::where('id', $id)->first();
    File::delete(public_path('foto') . '/' . $data_foto->foto);

    $About =[
      
        'desc' => $request->desc,
            'foto'=>$foto_nama
    ];
    }
    
        About::where('id', $id)->update($About);
        return redirect()->to('About')->with('success', 'Berhasil mengubah descripsi');
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
    
        About::where('id', $id)->delete();
        return redirect()->to('About')->with('success', 'Berhasil menghapus dataa');
    }
}
