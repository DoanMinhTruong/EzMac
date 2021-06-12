@extends("layouts.app")
@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            
            <div class="col-md-10 row justify-content-center carousel slide rounded" data-bs-ride="carousel" id="carousel-landing">
                <div 
                    style="
                        margin-top: 20%;
                        padding: 45px;
                        border : 5px solid black;
                        background-color: rgba(0, 0, 0, 0.2);
                        z-index: 1;
                        box-shadow: rgb(85, 91, 255) 0px 0px 0px 3px, rgb(31, 193, 27) 0px 0px 0px 6px, rgb(255, 217, 19) 0px 0px 0px 9px, rgb(255, 156, 85) 0px 0px 0px 12px, rgb(255, 85, 85) 0px 0px 0px 15px;
                        text-shadow: 6px 6px 0px rgba(0, 0, 0, 0.5);
                        font-size: 120px;
                        font-weight: bolder;
                    "
                    id="logo-ezmac"
                    class="h1 text-white position-absolute"
                >EzMAC
                <strong class="text-center d-block h2">enjoy the best rates</strong>
            </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" >
                        <img class="d-block w-100 " src="{{ URL::to('/images/landing/pic6.jpg') }}" alt="">
                    </div>
                    <div class="carousel-item " >
                        <img class="d-block w-100 " src="{{ URL::to('/images/landing/pic5.jpg') }}" alt="">
                    </div>
                    <div class="carousel-item " >
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
        <div class="container mt-3 col-10" id="new-product">
            <div class="h4 font-weight-bolder">NEW MACBOOK DAILY</div>
            <div class="row justify-content-between">
                @foreach ($new_daily as $p)
                    <div class="col-3" >
                        <div class="card">
                            <img width="300px" height="350px" src="{{ $p['image'] }}" class="border-bottom card-img-top" alt="">
                            <div class="card-body">
                                <div class="card-title h5 font-weight-bolder text-center">{{ $p['name'] }}</div>
                                <div class="card-text">
                                    <div class="price-are m-4 text-center">
                                        <span class="price py-2 px-3 bg-info font-weight-bolder text-light">${{ $p['price'] }}</span>
                                    </div>
                                    <div class="description">
                                        {!!  nl2br(e($p['description'])) !!}
                                    </div>
                                    <div class="buynow text-center my-3">
                                        <button class="btn btn-success">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection