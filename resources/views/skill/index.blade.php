@extends('template.admin')
@section('konten')    



        @include('pesan.pesan')
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="pb-3">
                  <a href='skill/create' class="btn btn-primary">+</a>
                </div>

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Foto</th>
                            <th class="col-md-1">Id</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($Skill as $item)
                      
                        <tr>
                            <td>
                                @if ($item->foto)
                                <img style='max-height:50px;max-width:50px' src='{{ url('foto').'/'.$item->foto }}'/>
                                @endif
                            </td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <a href= '{{url('skill/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('skill/'.$item->id) }}" method="post">
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