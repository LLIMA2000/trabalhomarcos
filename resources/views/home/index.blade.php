@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/bandai.jpg') }}" class="d-block w-100" alt="SH Figuarts Goku - Dragon Ball Z">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/teste.jpg') }}" class="d-block w-100" alt="SH Figuarts Dragon Ball">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/teste2.jpg') }}" class="d-block w-100" alt="SH Figuarts">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/xmen.jpg') }}" class="d-block w-100" alt="Mafex X-Men">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
@endsection