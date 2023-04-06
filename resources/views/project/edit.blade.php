@extends('template.admin')
@section('konten')   
@include('pesan.pesan')
<form action='{{ url('project/'.$project->id) }}'  method='post' enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('project')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            {{$project->id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' value="{{$project->judul}}" id="judul">
            </div>
        </div>
    
        <div class="mb-3 row">
            <label for="isi" class="form-label">desc</label>
            <textarea class="form-control  summernote" name="desc"  value="{{$project->desc}}" id="desc">{{$project->desc}}</textarea>
        </div>
              
        @if ($project->foto)
        <img style='max-height:100px;max-width:100px' src='{{ url('foto').'/'.$project->foto }}'/>
        @endif
        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name='foto'id="foto">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
</form>

@endsection