@extends('layout.master')
@section('content')
    <div class="container header-block p-2 mb-3  rounded text-center shadow ">
         <h5>Mes illustrations </h5>
    </div>
    <div class="container bg-white p-5 rounded shadow ">

        @if ($illustrations->count())
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($illustrations as $illustration)
                    <div class="col-lg-4">
                        <div class="card mt-2 ">
                            <a href="{{ route('USER-LOGGED-AFFICHER-ILUSTRATION', $illustration->id) }}"
                                class="text-decoration-none">
                                <img src="{{ asset($illustration->path_illustration) }}" class="card-img-top curor-pointer"
                                    alt="...">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('USER-LOGGED-AFFICHER-ILUSTRATION', $illustration->id) }}"
                                    class="text-decoration-none">
                                    <h5 class="card-title curor-pointer">{{ $illustration->titre }}</h5>
                                </a>
                                <div class="card-text" style="float: right">
                                    <a href="{{ route('USER-LOGGED-ADD-COMPOSANT-ILUSTRATION', $illustration->id) }}"><x-iconpark-targettwo
                                            class="icon-style-btn icon-warning" /></a>
                                    <a href="{{ route('USER-LOGGED-EDIT-COMPOSANT-ILUSTRATION', $illustration->id) }}"><x-carbon-edit
                                            class="icon-style-btn icon-secondary" /></a>
                                    {{-- <x-pepicon-loop class="icon-style-btn icon-success" /> --}}
                                    <x-carbon-translate class="icon-style-btn icon-info" />
                                    <x-carbon-close
                                        data-url="{{ route('USER-LOGGED-DELETE-ILUSTRATION', $illustration->id) }}"
                                        class="icon-style-btn icon-danger delete-illustration" />
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

        <x-carbon-add-filled class="icon-style-btn-Large icon-success  " data-bs-toggle="modal"
            data-bs-target="#exampleModal" />

    </div>


    @include('utilisateur.ajouter');
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            var illustrations = document.getElementsByClassName('delete-illustration')
            console.log(illustrations);

            for (let illustration of illustrations) {
                illustration.addEventListener('click', function(e) {

                    Swal.fire({
                        title: "Êtes-vous sûr?",
                        icon: "question",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Oui, supprimez-le!",
                        cancelButtonText: "Annuler",
                    }).then((result) => {

                        if (result.value) {

                            console.log(this.dataset.url);

                            var url = this.dataset.url;


                            console.log(url);
                            var xhr = new XMLHttpRequest();

                            // Configure it: DELETE request for a specific URL
                            xhr.open('DELETE', url, true);
                            xhr.setRequestHeader('Content-Type', 'application/json');
                            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                            xhr.onload = function() {
                                if (xhr.readyState == 4) {
                                    console.log(xhr.status);

                                    if (xhr.status == 200) {

                                        console.log(xhr.responseText);
                                        var response = JSON.parse(xhr.responseText);

                                        window.location.reload()





                                    } else {

                                        var response = JSON.parse(xhr.responseText);

                                        var string_error =
                                            '<b>Les données fournies ne sont pas valides </b><br>';

                                        for (var key in response) {
                                            if (response.hasOwnProperty(key)) {
                                                string_error += '<br>' + response[key][0];
                                            }
                                        }

                                        Swal.fire({
                                            title: "Erreur!",
                                            html: string_error,
                                            icon: "error"
                                        });


                                    }
                                }
                            };

                            // Send the request
                            xhr.send();
                        }

                    })
                });
            }

        });
    </script>
@endsection

@section('styles')
    <style>

    </style>
@endsection
