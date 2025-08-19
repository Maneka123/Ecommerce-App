@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <!-- Left Column: Product Image -->
            <aside class="col-sm-5 border-right">
                <section class="gallery-wrap">
                    <div class="img-big-wrap p-3">
                        <a href="#">
                            <img src="{{ Storage::url($product->image) }}" class="img-fluid" alt="Product Image">
                        </a>
                    </div>
                </section>
            </aside>

            <!-- Right Column: Product Details -->
            <aside class="col-sm-7">
                <section class="p-3">
                    <h3 class="title mb-3">{{$product->name}}</h3>

                    <p class="price-detail-wrap">
                        <span class="price h3 text-danger">
                            <span class="currency">US $</span>{{$product->price}}
                        </span>
                    </p>

                    <h4>Description</h4>
                    <p>{!! $product->description !!}</p>

                    <h4>Additional Information</h4>
                    <p>{!! $product->additional_info !!}</p>


                    <hr>

                    

                    <hr>

                    <a href="{{route('add.cart',[$product->id])}}" class="btn btn-lg btn-outline-primary text-uppercase">Add to cart</a>
                </section>
            </aside>
        </div>
    </div>
</div><br><br>
<!--my new code-->
@if(count($productFromSameCategories)>0)
<div class="jumbotron">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($productFromSameCategories as $product)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ Storage::url($product->image) }}" height="200" style="width:100%">
                                <div class="card-body">
                                    <p><b>{{ $product->name }}</b></p>
                                    <p class="card-text">{{ Str::limit($product->description, 120) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('product.view', $product->id) }}"><button type="button" class="btn btn-sm btn-outline-success">View</button></a>
                                            <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button></a>
                                            </a>
                                        </div>
                                        <small class="text-body-secondary">${{ $product->price }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
</div>
@endsection
