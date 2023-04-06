@extends('template.admin')
@section('konten')   
@include('pesan.pesan')
<form action='{{ url('About/'.$About->id) }}'  method='post' enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('About')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            {{$About->id}}
            </div>
        <div class="mb-3 row">
            <label for="isi" class="form-label">desc</label>
            <textarea class="form-control  summernote" name="desc"  value="{{$About->desc}}" id="desc">{{$About->desc}}</textarea>
        </div>


        @if ($About->foto)
        <img style='max-height:100px;max-width:100px' src='{{ url('foto').'/'.$About->foto }}'/>
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