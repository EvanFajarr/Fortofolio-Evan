@extends('template.admin')
@section('konten')    



        @include('pesan.pesan')
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="pb-3">
                  <a href='education/create' class="btn btn-primary">+</a>
                </div>

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Foto</th>
                            <th class="col-md-1">Id</th>
                            <th class="col-md-3">judul</th>
                            <th class="col-md-3">Desc</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($education as $edu)
                      
                        <tr>
                            <td>
                                @if ($edu->foto)
                                <img style='max-height:50px;max-width:50px' src='{{ url('foto').'/'.$edu->foto }}'/>
                                @endif
                            </td>
                            <td>{{$edu->id}}</td>
                            <td>{{$edu->judul}}</td>
                            <td>{!! $edu->desc !!}</td>
                            <td>
                                <a href= '{{url('education/'.$edu->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('education/'.$edu->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                         
                        @endforeach
                    </tbody>
                </table>
          </div>
          @endsection