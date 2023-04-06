@extends('template.admin')
@section('konten')    

@include('pesan.pesan')
<form action='{{ url('Experience') }}'  method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('Experience')}}' class="btn btn-primary"><-</a> 
        <div class="mb-3 row">
            <label for="judul" class="form-label">judul</label>
            <textarea class="form-control  summernote" name="judul"  value="{{Session::get('judul')}}" id="judul"></textarea>
        </div>

        <div class="mb-3 row">
            <label for="isi" class="form-label">desc</label>
            <textarea class="form-control  summernote" name="desc"  value="{{Session::get('desc')}}" id="desc"></textarea>
        </div>


        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
</form>
@endsection