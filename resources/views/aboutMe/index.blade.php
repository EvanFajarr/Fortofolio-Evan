@extends('template.user')
@section('konten')

<div style="background-color:#000;" class="container-fluid">
    <link rel="stylesheet" href="about.css">
    <div class="row">
     <div class="col-md-6 py-5">
            <img class="w-100" src="gambar.jpg" alt="">
        </div>
        <div class="col-md-6 py-5 fixed-end">
            <h1>Belajar Programing?</h1>
            <p>Belajar pemrograman atau programming di masa sekarang itu sangatlah mudah lho,Dengan hadirnya internet dan teknologi yang sudah serba canggih, mendapatkan informasi sudah semudah membalikkan telapak tangan.
Kamu dapat belajar apapun, termasuk belajar pemrograman, kapan pun dan di mana pun kamu berada.Saya juga sedang belajar pemograman,yuk belajar bareng</p>
       </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000" fill-opacity="1" d="M0,160L40,160C80,160,160,160,240,149.3C320,139,400,117,480,117.3C560,117,640,139,720,149.3C800,160,880,160,960,181.3C1040,203,1120,245,1200,261.3C1280,277,1360,267,1400,261.3L1440,256L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
{{-- <div class="container h-100">
    <div class="row align-items-center h-100">
      <div class="container">
        <h1 class="text-center">Skill</h1>
        <div class="slider"> 
          <div class="logos">
            @foreach ($Skill as $item)   
            @if ($item->foto)
         <img style='' src='{{ url('foto').'/'.$item->foto }}'class="gambarSkill"/>
            @endif
            @endforeach
            @foreach ($Skill as $item)   
            @if ($item->foto)
         <img  src='{{ url('foto').'/'.$item->foto }}'class="gambarSkill"/>
            @endif
          @endforeach
          </div> --}}
  
    
          
        </div>
      </div>
    </div>
  
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000" fill-opacity="1" d="M0,160L40,160C80,160,160,160,240,149.3C320,139,400,117,480,117.3C560,117,640,139,720,149.3C800,160,880,160,960,181.3C1040,203,1120,245,1200,261.3C1280,277,1360,267,1400,261.3L1440,256L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
@endsection