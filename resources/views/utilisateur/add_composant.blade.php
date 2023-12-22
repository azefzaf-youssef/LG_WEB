@extends('layout.master')

@section('content')
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
        <x-heroicon-s-check-circle class="icon-style-btn-Large icon-success " id="post-composant" data-url="{{route('USER-LOGGED-POST-ADD-COMPOSANT-ILUSTRATION')}}"/>
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


            var myModal = new Modal(document.getElementById('exampleModal'), {
                keyboard: false
            });

            document.getElementById('images').addEventListener('click', function(e) {
                function getXandY() {
                    myModal.show();
                    var rect = event.target.getBoundingClientRect();
                    var XX = event.clientX - rect.left; //x position within the element.
                    var XX_R = event.clientX - rect.right; //x position within the element.
                    var YY = event.clientY - rect.top; //y position within the element.
                    console.log("Left? : " + XX + " ; Top? : " + YY + ".");
                    let H = window.innerHeight;
                    let W = window.innerWidth;
                    console.log(H, W);
                    console.log(event);
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
                    console.log(composant);

                    console.log(locations);




                }
                getXandY();
            });
            document.getElementById('post-description').addEventListener('submit', function(e) {

                e.preventDefault();

                var description_text = document.getElementById('description').value;
                console.log(description_text);
                id_composant++;
                composant[composant.length - 1].id = id_composant;
                if (description_text.length == 0) {
                    composant[composant.length - 1].description = "Composant " + (id_composant);

                } else {
                    composant[composant.length - 1].description = description_text;

                }



                function removeDeletedComposantById(id_composant) {
                    return composant.filter(function(obj) {
                        return obj.id !== parseInt(id_composant);
                    });
                }

                function deleteComposant(id) {

                    console.log(id);
                    composant = removeDeletedComposantById(id);
                    console.log(composant);
                    showComposant();

                }

                function generateBtnDelete(element, YY, XX = null, rect = null, right = false) {

                    let btn_delete = document.createElement("div");

                    btn_delete.innerHTML =
                        `<x-carbon-close  class="icon-style-btn icon-danger delete-composant "  />`;
                    btn_delete.classList.add("line")
                    btn_delete.dataset.id = element.id;
                    btn_delete.style.top = YY - 10;
                    btn_delete.style.heigth = 1;
                    if (right) {
                        btn_delete.style.left = XX + (-element.eventClientX + rect.right) + 150;

                    } else {
                        btn_delete.style.left = -165;
                    }
                    btn_delete.style.zIndex = 200;
                    btn_delete.addEventListener('click', function(e) {
                        deleteComposant(this.dataset.id);
                    })

                    return btn_delete;

                }

                function generateDescription(element, YY, XX = null, rect = null, right = false) {
                    let description = document.createElement("div");

                    description.innerHTML = element.description;
                    description.classList.add("line");
                    description.style.top = YY - 10;
                    description.style.heigth = 1;
                    description.style.width = 90;
                    if (right) {
                        description.style.left = XX + (-element.eventClientX + rect.right) + 57;

                    } else {
                        description.style.left = -140;

                    }
                    description.style.zIndex = 200;

                    return description;
                }

                function generateLine(YY, XX, element ,rect = null, right = false) {

                    let div = document.createElement("div");

                    div.innerHTML += "";
                    div.classList.add("line")
                    div.style.top = YY;
                    div.style.heigth = 1;
                    if (right) {
                        div.style.width = 47 - (element.eventClientX - rect.right);
                        div.style.left = XX;
                    } else {
                        div.style.width = XX + 47;
                        div.style.left = -50;
                    }
                    div.style.border = "1px solid";
                    div.style.zIndex = 200;

                    return div;
                }

                function generateDot(YY, XX) {

                    let span = document.createElement("span");

                    span.classList.add("dot")
                    span.style.top = YY - 2;
                    span.style.heigth = 1;
                    span.style.left = XX - 3;
                    span.style.zIndex = 200;
                    span.style.position = "absolute";

                    return span;

                }

                function showComposant() {
                    let old_lines = document.getElementById("lines");
                    let image = document.getElementById("images");
                    old_lines.innerHTML = '';
                    old_lines.appendChild(image);

                    console.log(composant);
                    composant.forEach(element => {
                        var rect = element.rect;

                        console.log(element);
                        var YY = element.YY;
                        var XX = element.XX;
                        let line = document.getElementById("lines");
                        let div = document.createElement("div");
                        let description = document.createElement("div");
                        let span = document.createElement("span");

                        if (element.eventClientX < screen.width / 2) {

                            btn_delete = generateBtnDelete(element, YY)
                            line.appendChild(btn_delete);

                            description = generateDescription(element, YY)
                            line.appendChild(description);

                            div = generateLine(YY, XX)
                            line.appendChild(div);


                            span = generateDot(YY, XX);
                            line.appendChild(span);

                        } else {

                            btn_delete = generateBtnDelete(element, YY, XX, rect, true);
                            line.appendChild(btn_delete);

                            description = generateDescription(element, YY, XX, rect, true)
                            line.appendChild(description);

                            div = generateLine(YY ,XX,element, rect,true);
                            line.appendChild(div);

                            span = generateDot(YY, XX);
                            line.appendChild(span);

                        }

                    });


                }

                showComposant();

                myModal.hide();


            });


            document.getElementById('post-composant').addEventListener('click', function(e) {

                e.preventDefault();


                var formData = new FormData();
                formData.append('composants',JSON.stringify(composant));
                formData.append('id',"{{$illustration->id}}");
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
                                title: "Good job!",
                                text: "You clicked the button!",
                                icon: "success"
                            });

                            myModal.hide();

                            window.location.reload();

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
