<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Experience;


class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Experience= Experience::orderBy ('id','desc')->get();
        return view('Experience.index')->with('Experience',$Experience);
    }


    // public function pp(){
        
    //     $Experience= Experience::orderBy ('id','desc')->get();
    //     return view('home.index')->with('Experience',$Experience);
    // }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('Experience.create');
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
          
       ], [
           'judul.required' => 'judul wajib diisi',
           'desc.required' => 'descripsi wajib diisi',
       ]); 


       $Experience = [
           'judul' => $request->input('judul'),
           'desc' => $request->input('desc'),
       ];

   
       Experience::create($Experience);
       return redirect()->to('Experience')->with('success', 'Berhasil menambahkan data Experience');
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
        $Experience = Experience::where('id', $id)->first();
        return view('Experience.edit')->with('Experience', $Experience);
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
        $Experience = [
            'judul' => $request->judul,
            'desc' => $request->desc,
        ];
       

        Experience::where('id', $id)->update($Experience);
        return redirect()->to('Experience')->with('success', 'Berhasil mengubah data Experience');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Experience::where('id', $id)->delete();
        return redirect()->to('Experience')->with('success', 'Berhasil menghapus  Experience');
    }
}
