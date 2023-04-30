@extends('base')
@section('content')
    <!-- main start -->
    <!-- slider start -->
    <div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/01.jpg')}}" class="d-block w-100" alt="Wild Landscape" />
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/02.jpg')}}" class="d-block w-100" alt="Camera" />
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/03.jpg')}}" class="d-block w-100" alt="Exotic Fruits" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators"
            data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators"
            data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- slider end -->
    <!-- Category start -->
    <div class="container-fluid pt-5 bg-pink">
        <div class="container py-5">
            <div class="row row-cols-md-2 row-cols-lg-4 row-cols-sm-1">
                <div class="col">
                    <div class="card-make shadow-none">
                        <div>
                            <img style="border-radius: 15px" src="{{asset('img/categories/prodect1.jpg')}}" class="img-fluid w-100" />
                        </div>
                        <p class="text-center pt-2 text-light"><b>Suits</b></p>
                    </div>
                </div>
                <div class="col">
                    <div class="card-make shadow-none">
                        <div>
                            <img style="border-radius: 15px" src="{{asset('img/categories/shirt.jpg')}}" class="img-fluid" />
                        </div>
                        <p class="text-center pt-2 text-light"><b> Shirt</b></p>
                    </div>
                </div>
                <div class="col">
                    <div class="card-make shadow-none">
                        <div>
                            <img style="border-radius: 15px" src="{{asset('img/categories/shirt2.jpg')}}" class="img-fluid" />
                        </div>
                        <p class="text-center pt-2 text-light"><b>Upper</b></p>
                    </div>
                </div>
                <div class="col">
                    <div class="card-make shadow-none">
                        <div>
                            <img style="border-radius: 15px" src="{{asset('img/categories/suits11.jpg')}}" class="img-fluid" />
                        </div>
                        <p class="text-center pt-2 text-light"><b>Clothing Fabrics</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category end -->
    <!-- product start -->
    <div class="container mt-5">
        <h2 class="text-center mt-3">Product</h2>
        <div class="container mt-4">
            <div class="row row-cols-md-2 row-cols-lg-4 row-cols-sm-1">
                <div class="col">
                    <div class="card-make">
                        <div>
                            <img class="img-fluid" style="border-radius: 15px" src="{{asset('img/product/product1.jpg')}}"
                                alt="" />
                        </div>
                        <p class="text-center pt-2"><b>Suits</b></p>
                    </div>
                </div>
                <div class="col">
                    <div class="card-make">
                        <div>
                            <img class="img-fluid" style="border-radius: 15px" src="{{asset('img/product/product2.jpg')}}"
                                alt="" />
                        </div>
                        <p class="text-center pt-2"><b>Black Shirt</b></p>
                    </div>
                </div>
                <div class="col">
                    <div class="card-make">
                        <div>
                            <img class="img-fluid" style="border-radius: 15px" src="img/product/product3.jpeg"
                                alt="" />
                        </div>
                        <p class="text-center pt-2"><b>Man black blazers</b></p>
                    </div>
                </div>
                <div class="col">
                    <div class="card-make">
                        <div>
                            <img class="img-fluid" style="border-radius: 15px" src="{{asset('img/product/product4.jpg')}}"
                                alt="" />
                        </div>
                        <p class="text-center pt-2"><b>Cotton fabric</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product end -->
    <!-- services start -->
    <div class="container mt-5">
        <h2 class="text-center mb-5">services</h2>
        <div class="container mt-3">
            <div class="row row-cols-md-2 row-cols-lg-4 row-cols-sm-1">
                <div class="col">
                    <div class="card-make shadow-none">
                        <div>
                            <img class="img-fluid w-100" style="border-radius: 15px"
                                src="img/srevices/product 1.webp" />
                        </div>
                        <h4 class="mt-2">Custom Tailoring</h4>
                        <p class="text-justify pt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quae rerum perspiciatis
                            dolorum beatae, cupiditate repellat ducimus deserunt accusamus error inventore laudantium earum
                            est tenetur voluptates doloribus consequuntur in voluptatibus.
                        </p>
                        <button type="button" class="btn btn-pink">Equire Now</button>
                    </div>
                </div>
                <div class="col">
                    <div class="card-make shadow-none">
                        <div>
                            <img class="img-fluid w-100" style="border-radius: 15px"
                                src="img/srevices/product 2.webp" />
                        </div>
                        <h4 class="mt-2">Altering</h4>
                        <p class="pt-2 text-justify">
                            Lorem ipsum dolor sit amet. Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Consequuntur, voluptates. Quasi a eaque quis hic, dolores iusto voluptatem nisi distinctio
                            tempore pariatur. Quia dolorum eligendi ducimus voluptatibus ipsa a unde?
                        </p>
                        <button type="button" class="btn btn-pink">Equire Now</button>
                    </div>
                </div>
                <div class="col">
                    <div class="card-make shadow-none">
                        <div>
                            <img class="img-fluid w-100" style="border-radius: 15px" src="{{asset('img/srevices/prodect.jpg')}}" />
                        </div>
                        <h4 class="mt-2">Wedding outfit Taloring</h4>
                        <p class="text-justify pt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus impedit inventore
                            laudantium a quisquam, dolores dignissimos laborum odio possimus. Placeat culpa explicabo eius
                            mollitia exercitationem, quibusdam ducimus rem recusandae nostrum.
                        </p>
                        <button type="button" class="btn btn-pink">Equire Now</button>
                    </div>
                </div>
                <div class="col">
                    <div class="card-make shadow-none">
                        <div>
                            <img class="img-fluid w-100" style="border-radius: 15px"
                                src="img/srevices/product 4.webp" />
                        </div>
                        <h4 class="mt-2">Home visit tailor</h4>
                        <p class="text-justify pt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, modi! Lorem ipsum dolor sit amet
                            consectetur, adipisicing elit. Culpa, omnis nam ipsa temporibus libero et quia, nemo illum
                            veritatis unde dolorem, error dolores nulla sint deserunt voluptas voluptatem laudantium quo.
                        </p>
                        <button type="button" class="btn btn-pink">Equire Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services end -->
    <!-- main end -->
@endsection
