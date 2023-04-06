@extends('template.user')
@section('konten')
{{-- <link rel="stylesheet" href="about.css"> --}}

      <!-- jumbotron -->
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

      <div class="page-body-wrapper">
        <section id="home" class="home">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="main-banner">
                  <div class="d-sm-flex justify-content-between">
                    <div data-aos="zoom-in-up">
                      <div class="banner-title">
                          <h3 class="font-weight-medium">I'm Evan Fajar
                        </h3>
                      </div>
                      <p class="mt-3 efek" >
                        <br>
                      </p>
                      <a href="#about" class="btn btn-secondary mt-3">About Me</a>
                    </div>
        
                  </div>
                </div>
                <script >const txtElement = ["Hi, everyone!,my full name is Evan Fajar Krisdiyanto, you can call me Evan. I live in Bantul.I really like music and watch anime. Besides that, I am also interested in Programing. ", ""];
                  let count = 0;
                  let txtIndex = 0;
                  let currentTxt = "";
                  let words = "";
                  (function ngetik() {
                      if (count == txtElement.length) {
                          count = 0;
                      }
                  
                      currentTxt = txtElement[count];
                  
                      words = currentTxt.slice(0, ++txtIndex);
                      document.querySelector(".efek").textContent = words;
                  
                      setTimeout(ngetik, 50);
                  })();</script>
              </div>
            </div>
          </div>
        </section>

      <!-- akhir jumbotron --> 
  
   

<!--education-->
    {{-- 4 colom --}}
          <section class="our-services" id="education">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <h3 class="font-weight-medium text-dark mb-5">Education</h3>
                </div>
              </div>
             
              <div class="row" data-aos="fade-up">
                @foreach ($education as $edu)
                <div class="col-sm-4 text-center text-lg-left">
                  <div class="services-box" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                    <img style="width:80px; height:80px;"src="edu.svg" alt="integrated-marketing" data-aos="zoom-in">
                    <h6 class="text-dark mb-3 mt-4 font-weight-medium">{{ $edu->judul }}
                    </h6>
                    <p>{!! $edu->desc !!}
                    </p>
                  </div>
                 
                </div>
                @endforeach
             
            </div>
              </div>
             
              <div class="container"  id="ex">
                <div class="row">
                  <div class="col-sm-12">
                    <h3 class="font-weight-medium text-dark mb-5">Experience</h3>
                  </div>
                </div>
             
                <div class="row" data-aos="fade-up">
                  @foreach ($Experience as $item)
                  <div class="col-sm-4 text-center text-lg-left">
                    <div class="services-box" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                      <img  style="width:80px; height:80px;" src="ex.svg" alt="integrated-marketing" data-aos="zoom-in">
                      <h6 class="text-dark mb-3 mt-4 font-weight-medium">{!! $item->judul !!}
                      </h6>
                      <p>{!! $item->desc !!}
                      </p>
                    </div>
                  </div>
                  </div>
                </div>
                @endforeach
          </section>
          <!--education-->

        {{-- aboutme --}}
          <section class="our-process" id="about">
            <div class="container">
              <div class="row">
                <div class="col-sm-6" data-aos="fade-up">
                  <h3 class="font-weight-medium text-dark">About Me</h3>
                  @foreach ($About as $b)
                  {{-- <h5 class="text-dark mb-3">Imagination will take us everywhere</h5> --}}
                  <p class="font-weight-medium mb-4">{!! $b->desc !!}
                  </p> 
                </div>
                <div class="col-sm-6 text-right" data-aos="zoom-in-up">
                  @if ($b->foto)
              <img style="height:500px;" src='{{ url('foto').'/'.$b->foto }}'class="img-fluid "/>
                 @endif
                </div>
              </div>
              @endforeach
            </div>
          </section>
      
 {{-- aboutme --}}


         {{-- skill --}}
          <div  class="container h-100" id="skill">
            <div class="row align-items-center h-100">
              <div style="margin-top:5rem;" class="container">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
              <style>
                .container {
 width: 100%;

    
}
    .slider {
      animation: slidein 20s linear infinite;
      white-space: nowrap;
    }
      .logos {
        width: 100%;
        display: inline-block;
        margin: 0px 0;
      }
        .fab {
          width: calc(100% / 5);
          animation: fade-in 0.5s 
            cubic-bezier(0.455, 0.03, 0.515, 0.955) forwards;
        }

  
  @keyframes slidein {
    from {
      transform: translate3d(0, 0, 0);
    }
    to {
      transform: translate3d(-100%, 0, 0);
    }
  }
  
  @keyframes fade-in {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  
  .gambarSkill{
    max-height:150px;
    max-width:150px;
    padding:10px;
  }



              </style>
    {{-- skill --}}
         


    {{-- project --}}
    <section class="our-projects" id="projects">
      <div class="container">
        <div class="row mb-5">
          <div class="col-sm-12">
            <div class="d-sm-flex justify-content-between align-items-center mb-2">
              <h3 class="font-weight-medium text-dark ">My Project</h3>
              <div><a href="https://github.com/EvanFajarr" class="btn btn-outline-primary"  target="blank">View more</a></div>
            </div>
          </div>
        </div>
      </div>
    

      <div class="mb-5" data-aos="fade-up">
        <div class="owl-carousel-projects owl-carousel owl-theme">
          @foreach ($project as $item)
          <div class="item">
            {{-- <img src="images/carousel/slider1.jpg" alt="slider"> --}}
            @if ($item->foto)
            <img src='{{ url('foto').'/'.$item->foto }}'/>
            @endif
            <p class="font-weight-medium mb-4">{{ $item->judul }}
          </div>
        
          @endforeach
        </div>
      </div>
 
            </div>
          </div>
        </div>
      </div>
    </section>
       
  <!--education-->

	<section class="contactus" id="contact">
    <div class="container">
      <div class="row mb-5 pb-5">
        <div class="col-sm-5" data-aos="fade-up" data-aos-offset="-500">
          <img src="images/contact.jpg" alt="contact" class="img-fluid">
        </div>
        <div class="col-sm-7" data-aos="fade-up" data-aos-offset="-500">
          <h3 class="font-weight-medium text-dark mt-5 mt-lg-0">Got A Problem</h3>
          <h5 class="text-dark mb-5">Lorem ipsum dolor sit amet, consectetur pretium</h5>
          <form>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" placeholder="Name*">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" class="form-control" id="mail" placeholder="Email*">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" placeholder="Message*" rows="5"></textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <a href="#" class="btn btn-secondary">SEND</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
 
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <script>   
        AOS.init(); 
   </script>

@endsection