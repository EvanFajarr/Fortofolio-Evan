@extends('template.admin')
@section('konten')    

@include('pesan.pesan')
<form action='{{ url('About') }}'  method='post'enctype="multipart/form-data" >
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('About')}}' class="btn btn-primary"><-</a> 

        <div class="mb-3 row">
            <label for="isi" class="form-label">desc</label>
            <textarea class="form-control  summernote" name="desc"  value="{{Session::get('desc')}}" id="desc"></textarea>
        </div>

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