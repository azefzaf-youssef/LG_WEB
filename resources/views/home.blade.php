@extends('layout.master')
@section('scripts')
@endsection
@section('content')

<div class="container header-block p-2 mb-3  rounded text-center shadow ">
    <h5>Illustrations </h5>
</div>
    <div class="container bg-white p-5 rounded shadow ">

        @if ($illustrations->count())
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($illustrations as $illustration)
                    <div class="col-lg-4">
                        <div class="card mt-2 ">
                            <a href="{{ route('USER-LOGGED-AFFICHER-ILUSTRATION',$illustration->id) }}" class="text-decoration-none">
                                <img src="{{ asset($illustration->path_illustration) }}" class="card-img-top curor-pointer"
                                    alt="...">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('TEST') }}" class="text-decoration-none">
                                    <h5 class="card-title curor-pointer">{{ $illustration->titre }}</h5>
                                </a>
                                <div class="card-text" style="float: right">
                                    <x-iconpark-targettwo class="icon-style-btn icon-warning" />
                                    <a href="{{route('USER-LOGGED-ADD-COMPOSANT-ILUSTRATION',$illustration->id)}}"><x-carbon-edit class="icon-style-btn icon-secondary" /></a>
                                    {{-- <x-pepicon-loop class="icon-style-btn icon-success" /> --}}
                                    <x-carbon-translate class="icon-style-btn icon-info" />
                                    <x-carbon-close class="icon-style-btn icon-danger" />
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach


            </div>

            {!! $illustrations->links() !!}
        @else
            <div class="text-center">
                Aucune donnée disponible
            </div>
        @endif









    </div>



@endsection


@section('styles')
    <style>

    </style>
@endsection
