@extends('layout.master')

@section('content')
    <div class="container bg-white p-5 rounded shadow ">
        <div class="title-2 pb-4">Termenoligie</div>


        <div class="row ">
            <div class="col"></div>

            <div class=" col ">
                <div class="card card-img ">
                    <div id="lines">
                        <img id="images" onclick="getXandY()" src="{{ asset($illustration->path_illustration) }}"
                            alt="">
                    </div>
                </div>
            </div>

            <div class="col"></div>

        </div>
    </div>

    <div class="md-fab-wrapper">

        <x-heroicon-s-check-circle class="icon-style-btn-Large icon-success " data-bs-toggle="modal"
            data-bs-target="#exampleModal" />


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
                composant[composant.length-1].description = description_text;

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

                            description.innerHTML = element.description;
                            description.classList.add("line")
                            description.style.top = YY - 10;
                            description.style.heigth = 1;
                            description.style.width = 47 - (element.eventClientX - rect.right);
                            description.style.right = XX + 100;
                            description.style.zIndex = 200;

                            line.appendChild(description);

                            div.innerHTML += "";
                            div.classList.add("line")
                            div.style.top = YY;
                            div.style.heigth = 1;
                            div.style.width = XX + 47;
                            div.style.left = -50;
                            div.style.border = "1px solid";
                            div.style.zIndex = 200;
                            line.appendChild(div);

                            span.classList.add("dot")
                            span.style.top = YY - 2;
                            span.style.heigth = 1;
                            span.style.left = XX - 3;
                            span.style.zIndex = 200;
                            span.style.position = "absolute";
                            line.appendChild(span);

                        } else {

                            description.innerHTML = "description"
                            description.classList.add("line")
                            description.style.top = YY - 10;
                            description.style.heigth = 1;
                            description.style.left = XX + (-element.eventClientX + rect.right) + 57;
                            description.style.zIndex = 200;

                            line.appendChild(description);

                            div.innerHTML += "";
                            div.classList.add("line")
                            div.style.top = YY;
                            div.style.heigth = 1;
                            div.style.width = 47 - (element.eventClientX - rect.right);
                            div.style.left = XX;

                            div.style.border = "1px solid";
                            div.style.zIndex = 200;
                            line.appendChild(div);

                            span.classList.add("dot")
                            span.style.top = YY - 2;
                            span.style.heigth = 1;
                            span.style.left = XX - 3;
                            span.style.zIndex = 200;
                            span.style.position = "absolute";
                            line.appendChild(span);

                        }

                    });


                }

                showComposant();

                myModal.hide();


            });
        });
    </script>
@endsection
