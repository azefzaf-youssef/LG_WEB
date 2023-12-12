@extends('layout.master')
@section('scripts')


@endsection
@section('content')
    <div class="container bg-white p-5">

        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card h-100">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card titleCard titleCard titleCard titleCard titleCard titleCard titleCard title</h6>
                    </div>
                </div>
            </div>






        </div>

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

        <button type="button" class="md-fab md-fab-secondary " data-bs-toggle="modal"
            data-bs-target="#exampleModal">Ajouter </button>

    </div>


    @include('utilisateur.ajouter');
@endsection


@section('styles')
    <style>

    </style>
@endsection
