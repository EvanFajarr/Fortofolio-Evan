@extends('template.user')
@section('konten')

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000" fill-opacity="1" d="M0,288L40,266.7C80,245,160,203,240,181.3C320,160,400,160,480,181.3C560,203,640,245,720,229.3C800,213,880,139,960,138.7C1040,139,1120,213,1200,213.3C1280,213,1360,139,1400,101.3L1440,64L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
<h2 class="text-dark"><center>My Project</h2>

@foreach ($project as $projects)
      <div class="row col-md-12 featurette shadow-lg p-3 mb-5  border-dark mb-3">
        <div class="col-md-6">
          <h2 class="featurette-heading fw-normal lh-1">{{ $projects->judul }}</h2>
          <p class="lead">{!! $projects->desc !!}</p>
        </div>
        <div class="col-md-6">
          {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> --}}
          @if ($projects->foto)
          <img style='max-height:350px;max-width:350px' src='{{ url('foto').'/'.$projects->foto }}'/>
          @endif
        </div>
      </div>
    </div>
 
      <style>
   .col-md-6{
    padding:50px;

   }

  
        .row{
          padding:50px;
          height:50%;
         justify-content: center;
         position: center;
        }
    h2{
      margin-bottom:10px;
    }
        </style>
</center>
        
      @endforeach
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000" fill-opacity="1" d="M0,192L80,202.7C160,213,320,235,480,229.3C640,224,800,192,960,186.7C1120,181,1280,203,1360,213.3L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
     

@endsection