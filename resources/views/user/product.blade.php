@extends('layouts.app')
@section("content")
    <div class="container">
        <div class="row mt-4">
            <div class="col-6 border rounded">
                <img width="500px" src="/{{ $product['image'] }}" alt="">
            </div>
            <div class="col-6 px-5">
                <h2 class="font-weight-bolder">{{ $product['name'] }}</h2>
                <div class="m-4 description">
                    <div class="h3 bolder">Description : </div>
                    <div class="h5 ml-3 ">
                        {!! nl2br(e($product['description'])) !!}
                    </div>
                </div>
                <div class="price m-4">
                    <div class="h3 bolder">Price :</div>
                    <div class="h5 ml-5 px-5">
                        <span class="bg-info h3 bolder text-white px-3 py-2">
                            ${{ $product['price'] }}
                        </span>
                    </div>
                </div>
                <div class="amount form-inline m-4 ">
                    <span class="h3 bolder">Amount :</span>
                    <input width="30px"  class="ml-3 form-control" max="99" min="1" name="" type="number" value="1">
                </div>
                <div class="m-5 cart form-inline">
                    <a href="/" class="btn btn-warning mx-3">Go To Cart</a>
                    <a href="/" class="btn btn-success">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
@endsection