@extends('layouts.index', ['title' => 'Acceuil'])

@section('content')
    <main class="container">
        <section class="intro">
            <h1>Devenez le mozart de la moto avec wolf <span>gang</span> !</h1>
              <div class="div-slide">
                    <ul>
                        <li>
                            <img class="mySlides" src="{{ asset('uploads/slider/1.jpg')}}" />
                        </li>
                        <li>
                            <img class="mySlides" src="{{ asset('uploads/slider/2.jpg')}}" />
                        </li>
                        <li>
                            <img class="mySlides" src="{{ asset('uploads/slider/3.jpg')}}" />
                        </li>
                    </ul>
                    <div class="div-direction">
                        <div class="div-rigth" onclick="plusDivs(-1)">&#10094;</div>
                        <div class="div-left" onclick="plusDivs(1)">&#10095;</div>
                    </div>
                </div>
          </section>
    </main>
@stop