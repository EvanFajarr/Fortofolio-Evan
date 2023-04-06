@extends('template.admin')
@section('konten')   
@include('pesan.pesan')
<form action='{{ url('skill/'.$Skill->id) }}'  method='post' enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('skill')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            {{$Skill->id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{$Skill->nama}}" id="nama">
            </div>
        </div>
    
              
        @if ($Skill->foto)
        <img style='max-height:100px;max-width:100px' src='{{ url('foto').'/'.$Skill->foto }}'/>
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