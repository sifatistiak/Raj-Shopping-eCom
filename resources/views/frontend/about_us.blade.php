@extends('layouts.frontend')
@section('title','About Us')
@section('content')


<div class="container"><br>
    <div class="row">
        <div class="col-md-10">
            <div class="section-title">
                <h2 class="title">About Us</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <img class="img-responsive" src="{{asset('frontend/img/about.png')}}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9"><br>
            <p style="text-align:justify"><span style="font-size:17px">

                    Welcome to Banglarmela.com. We are an online E-commerce platform. We are providing the best quality of 3
                    pieces for women.
                    The products are at a low cost. This platform helps people to buy a product from home. <br><br>
                    We are providing an excellent customer experience, ease-of-purchase, comprehensive customer care,
                    and hassle-free
                    shopping and return experience. We believe in giving the best to our customers. We expect the
                    highest standards of
                    honesty and deliver our commitments. We know our priorities and when we do something, we do it with
                    focus.<br><br>
                    We offer 100s of products at the best price. We are using the Pathao courier as our delivery partner
                    which is very fast.
                    So we can deliver our product as fast as possible. We provide 100% protection of your purchase
                    product.
                </span></p>
        </div>
    </div>
</div>

</div>

@endsection
