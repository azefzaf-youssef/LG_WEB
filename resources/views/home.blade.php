@extends('layout.master')
@section('scripts')
    <script></script>
@endsection
@section('content')
    <div class="container bg-white p-5">

        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card h-100">
                    <img src="images.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="images.jpg" class="card-img-top" alt="...">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter illustration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal content goes here -->
                    <div class="col-xxl">

                        <div class="card-body">
                            <form>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Titre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="titre" id="basic-default-name"
                                            placeholder="Titre .." />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Langue</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option ></option>
                                            @foreach ($langues as $langue)
                                                <option value="{{ $langue->id }}">{{ $langue->langue }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <label class="col-sm-2 col-form-label" for="illustration">Illustration</label>

                                    <div class="col-sm-10">
                                            <input type="file" class="form-control-file" name="illustration" id="illustration">
                                    </div>
                                </div>

                                <div class="row justify-content-end">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('styles')
    <style>

    </style>
@endsection
