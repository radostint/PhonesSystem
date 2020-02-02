@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row landing-page">
            <div class="col-md-12" style="height: auto;padding-bottom: 30px;">
                <div class="row">
                    <div class="col-md-6">
                        <div
                            style="width: 715px;height: 395px;background-image: url('images/landing-banner.png');background-size: 715px 395px;overflow: hidden;">
                            <div class="sale-info justify-content-center" style="text-align: center">
                                <h1>BIG SALE</h1>
                                <h2>On all phones</h2>
                                <h4>01.01.-03.02.2020</h4>
                                <h3 id="promo"></h3>
                            </div>
                            <a href="phones" class="btn btn-success-pulse lp-info-btn">View all phones</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="custom-card">
                                <div class="left">
                                    <img src="storage/images/phones/JHryA34l6YWlUhwKp9hKJygcWnATUAUIjaWUhdzS.png"
                                         style="width: 400px"
                                         alt="shoe">
                                </div>
                                <div class="right">
                                    <div class="product-info">
                                        <div class="product-name">
                                            <img
                                                src="storage/images/manufacturers/VSwuJ1CsFH7LgiXqrNdAijX4kDBUV7QjbrabUTj1.png">
                                        </div>
                                        <div class="details">
                                            <h3>Released: 2019</h3>
                                            <h2>Galaxy S10+</h2>
                                        </div>
                                        <span class="foot"><i class="fa fa-shopping-bag"></i>Buy Now</span>
                                        <span class="foot"><i class="fa fa-shopping-cart"></i>Add TO Cart</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Feb 3, 2020 16:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("promo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s LEFT";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("promo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection
