@extends('layout.master')
@section('scripts')
@endsection
@section('content')
<div class="container bg-white p-4 mb-3  rounded text-center ">
    <h3>Liste des illustrations </h3>
</div>
    <div class="container bg-white p-5 rounded ">

        @if ($illustrations->count())
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($illustrations as $illustration)
                    <div class="col-lg-4">
                        <div class="card mt-2 ">
                            <a href="{{ route('TEST') }}" class="text-decoration-none">
                                <img src="{{ asset($illustration->path_illustration) }}" class="card-img-top curor-pointer"
                                    alt="...">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('TEST') }}" class="text-decoration-none">
                                    <h5 class="card-title curor-pointer">{{ $illustration->titre }}</h5>
                                </a>
                                <div class="card-text" style="float: right">
                                    <x-iconpark-targettwo class="icon-style-btn icon-warning" />
                                    <x-carbon-edit class="icon-style-btn icon-secondary" />
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




        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    ...
                </div>
            </div>
        </div>




    </div>
    <div class="md-fab-wrapper">

        <x-carbon-add-filled class="icon-style-btn-Large icon-success " data-bs-toggle="modal"
            data-bs-target="#exampleModal" />

    </div>


    @include('utilisateur.ajouter');
@endsection


@section('styles')
    <style>

    </style>
@endsection
