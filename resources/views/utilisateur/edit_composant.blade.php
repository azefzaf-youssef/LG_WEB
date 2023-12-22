@extends('layout.master')

@section('content')
    <div class="container  p-3 header-block  rounded mb-4  shadow">
        <h4> Titre : <i>{{ $illustration->titre }} </i></h4>
        Langue : <span>{{ $illustration->langue->langue }}</span><br>
    </div>
    <div class="container-sm   rounded   ">


        <div class="row  ">
            <div class="col  ps-0  ">
                <ul class="list-group shadow ">
                    <li class="list-group-item hover-composant ">An active item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul>
            </div>


            {{-- <div class="col  bg-white  shadow  ">

            </div> --}}


            <div class=" col-9  bg-white shadow  ">
                <div class="card card-img " style="left: 16% ;width: fit-content;">
                    <div id="lines" class="container-fluide">
                        <img id="images" onclick="getXandY()" src="{{ asset($illustration->path_illustration) }}"
                            alt="">
                    </div>
                </div>
            </div>

            {{-- <div class="col bg-white shadow"></div> --}}

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
            width: 100%;
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

            var composant = [{
                    "eventClientX": 667,
                    "eventClientY": 339,
                    "XX": 195,
                    "YY": 152.76666259765625,
                    "rect": {
                        "x": 472,
                        "y": 186.23333740234375,
                        "width": 640,
                        "height": 526.316650390625,
                        "top": 186.23333740234375,
                        "right": 1112,
                        "bottom": 712.5499877929688,
                        "left": 472
                    },
                    "description": "composanr 1"
                },
                {
                    "eventClientX": 964,
                    "eventClientY": 546,
                    "XX": 492,
                    "YY": 359.76666259765625,
                    "rect": {
                        "x": 472,
                        "y": 186.23333740234375,
                        "width": 640,
                        "height": 526.316650390625,
                        "top": 186.23333740234375,
                        "right": 1112,
                        "bottom": 712.5499877929688,
                        "left": 472
                    },
                    "description": "composanr 1"
                },
                {
                    "eventClientX": 654,
                    "eventClientY": 472,
                    "XX": 182,
                    "YY": 285.76666259765625,
                    "rect": {
                        "x": 472,
                        "y": 186.23333740234375,
                        "width": 640,
                        "height": 526.316650390625,
                        "top": 186.23333740234375,
                        "right": 1112,
                        "bottom": 712.5499877929688,
                        "left": 472
                    },
                    "description": "composanr 1"
                },
                {
                    "eventClientX": 654,
                    "eventClientY": 627,
                    "XX": 182,
                    "YY": 440.76666259765625,
                    "rect": {
                        "x": 472,
                        "y": 186.23333740234375,
                        "width": 640,
                        "height": 526.316650390625,
                        "top": 186.23333740234375,
                        "right": 1112,
                        "bottom": 712.5499877929688,
                        "left": 472
                    },
                    "description": "composanr 1"
                },
                {
                    "eventClientX": 528,
                    "eventClientY": 277,
                    "XX": 56,
                    "YY": 90.76666259765625,
                    "rect": {
                        "x": 472,
                        "y": 186.23333740234375,
                        "width": 640,
                        "height": 526.316650390625,
                        "top": 186.23333740234375,
                        "right": 1112,
                        "bottom": 712.5499877929688,
                        "left": 472
                    },
                    "description": "1 1"
                }
            ];

            function showComposant() {
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

                        description.innerHTML = "description"
                        description.classList.add("line")
                        description.style.top = YY - 10;
                        description.style.heigth = 1;
                        description.style.width = 90;
                        description.style.left = -140;

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


        });
    </script>
@endsection
