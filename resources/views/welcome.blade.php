@extends("layouts.app")
@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 carousel slide rounded" data-bs-ride="carousel" id="carousel-landing">
                <div class="carousel-inner">
                    
                    <div class="carousel-item active" >
                        <img class="d-block w-100" src="{{ URL::to('/images/landing/pic0.jpg') }}" alt="">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="{{ URL::to('/images/landing/pic1.jpg') }}" alt="">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="{{ URL::to('/images/landing/pic2.jpg') }}" alt="">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="{{ URL::to('/images/landing/pic3.jpg') }}" alt="">
                    </div>
                    <a class="carousel-control-prev" href="#carousel-landing" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carousel-landing" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                </div>
            </div>
        </div>
    </div>
@endsection