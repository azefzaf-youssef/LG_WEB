@extends('layout.master')

@section('content')
    <div class="container  p-3 header-block  rounded mb-4  shadow">
        <h4> Titre : <i>{{ $illustration->titre }} </i></h4>
        Langue : <span>{{ $illustration->langue->langue }}</span><br>
    </div>
    <div class="container bg-white p-5 rounded shadow ">
        <div class="title-2 pb-4">Termenoligie</div>


        <div class="row ">
            <div class="col"></div>

            <div class=" col ">
                <div class="card card-img ">
                    <div id="lines">
                        <img id="images" src="{{ asset($illustration->path_illustration) }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col"></div>

        </div>
    </div>

    <div class="md-fab-wrapper">
        <x-heroicon-s-check-circle class="icon-style-btn-Large icon-success " id="post-composant"
            data-url="{{ route('USER-LOGGED-POST-ADD-COMPOSANT-ILUSTRATION') }}" />
    </div>

    </div>
    @include('utilisateur.ajouter_composant_pop_up');
@endsection

@section('styles')
    <style>
        .line {
            position: absolute;
            cursor: default;
            text-align: inherit;
        }

        #images {
            width: 40rem;

        }

        .card-img {
            background: none;
            border: none;
        }

        .dot {
            height: 5px;
            width: 5px;
            background-color: rgb(0, 0, 0);
            border-radius: 50%;
            display: inline-block;

        }
    </style>
@endsection

@section('scripts')
    <script>
        var composant = [];
        var id_composant = 0;

        document.addEventListener("DOMContentLoaded", function() {

            function removeDeletedComposantById(id_composant) {
                return composant.filter(function(obj) {
                    return obj.id !== parseInt(id_composant);
                });
            }

            function deleteComposant(id, old_lines, image, composant) {

                composant = removeDeletedComposantById(id);
                showComposant(old_lines, image, composant);
                return composant;

            }

            function getXandY() {
                myModal.show();
                var rect = event.target.getBoundingClientRect();
                var XX = event.clientX - rect.left;
                var XX_R = event.clientX - rect.right;
                var YY = event.clientY - rect.top;
                let H = window.innerHeight;
                let W = window.innerWidth;
                let x = event.clientX;
                let y = event.clientY;


                let locations = {
                    "eventClientX": event.clientX,
                    "eventClientY": event.clientY,
                    "XX": XX,
                    "YY": YY,
                    "rect": rect
                }

                composant.push(locations);

            }

            var myModal = new Modal(document.getElementById('exampleModal'), {
                keyboard: false
            });

            document.getElementById('images').addEventListener('click', function(e) {
                getXandY();
            });

            document.getElementById('post-description').addEventListener('submit', function(e) {

                e.preventDefault();

                var description_text = document.getElementById('description').value;
                id_composant++;
                composant[composant.length - 1].id = id_composant;
                if (description_text.length == 0) {
                    composant[composant.length - 1].description = "Composant " + (id_composant);

                } else {
                    composant[composant.length - 1].description = description_text;

                }


                let old_lines = document.getElementById("lines");
                let image = document.getElementById("images");
                composant = showComposant(old_lines, image, composant, true);

                deletes = document.getElementsByClassName('delete-composant');
                for (let index = 0; index < deletes.length; index++) {
                    deletes[index].addEventListener('click', function(e) {
                        composant = deleteComposant(this.dataset.id, old_lines, image, composant);
                    });

                }

                myModal.hide();


            });


            document.getElementById('post-composant').addEventListener('click', function(e) {

                e.preventDefault();


                var formData = new FormData();
                formData.append('composants', JSON.stringify(composant));
                formData.append('id', "{{ $illustration->id }}");
                var xhr = new XMLHttpRequest();
                var url = this.dataset.url;
                xhr.open('POST', url, true);
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        console.log(xhr.status);

                        if (xhr.status == 200) {

                            console.log(xhr.responseText);
                            var response = JSON.parse(xhr.responseText);

                            Swal.fire({
                                title: "Action effectuée avec succès!",
                                icon: "success",
                                showConfirmButton: false,
                                timer:1000
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href = "{{route('USER-LOGGED-INDEX')}}"
                                }
                            });;



                        } else {

                            var response = JSON.parse(xhr.responseText);

                            var string_error = '<b>Les données fournies ne sont pas valides </b><br>';

                            for (var key in response) {
                                if (response.hasOwnProperty(key)) {
                                    string_error += '<br>' + response[key][0];
                                }
                            }

                            console.log(response);
                            Swal.fire({
                                title: "Erreur!",
                                html: string_error,
                                icon: "error"
                            });


                        }
                    }
                };

                xhr.send(formData);
            });

        });
    </script>
@endsection
