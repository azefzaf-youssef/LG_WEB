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
    </div>
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
    document.addEventListener("DOMContentLoaded", function() {

        var composant = [{
                "eventClientX": 489,
                "eventClientY": 287,
                "XX": 89,
                "YY": 100.76666259765625,
                "rect": {
                    "x": 400,
                    "y": 186.23333740234375,
                    "width": 640,
                    "height": 612,
                    "top": 186.23333740234375,
                    "right": 1040,
                    "bottom": 798.2333374023438,
                    "left": 400
                }
            },
            {
                "eventClientX": 490,
                "eventClientY": 359,
                "XX": 90,
                "YY": 172.76666259765625,
                "rect": {
                    "x": 400,
                    "y": 186.23333740234375,
                    "width": 640,
                    "height": 612,
                    "top": 186.23333740234375,
                    "right": 1040,
                    "bottom": 798.2333374023438,
                    "left": 400
                }
            },
            {
                "eventClientX": 832,
                "eventClientY": 447,
                "XX": 432,
                "YY": 260.76666259765625,
                "rect": {
                    "x": 400,
                    "y": 186.23333740234375,
                    "width": 640,
                    "height": 612,
                    "top": 186.23333740234375,
                    "right": 1040,
                    "bottom": 798.2333374023438,
                    "left": 400
                }
            },
            {
                "eventClientX": 883,
                "eventClientY": 392,
                "XX": 483,
                "YY": 205.76666259765625,
                "rect": {
                    "x": 400,
                    "y": 186.23333740234375,
                    "width": 640,
                    "height": 612,
                    "top": 186.23333740234375,
                    "right": 1040,
                    "bottom": 798.2333374023438,
                    "left": 400
                }
            },
            {
                "eventClientX": 488,
                "eventClientY": 623,
                "XX": 88,
                "YY": 436.76666259765625,
                "rect": {
                    "x": 400,
                    "y": 186.23333740234375,
                    "width": 640,
                    "height": 612,
                    "top": 186.23333740234375,
                    "right": 1040,
                    "bottom": 798.2333374023438,
                    "left": 400
                }
            },
            {
                "eventClientX": 487,
                "eventClientY": 673,
                "XX": 87,
                "YY": 486.76666259765625,
                "rect": {
                    "x": 400,
                    "y": 186.23333740234375,
                    "width": 640,
                    "height": 612,
                    "top": 186.23333740234375,
                    "right": 1040,
                    "bottom": 798.2333374023438,
                    "left": 400
                }
            },
            {
                "eventClientX": 485,
                "eventClientY": 582,
                "XX": 85,
                "YY": 395.76666259765625,
                "rect": {
                    "x": 400,
                    "y": 186.23333740234375,
                    "width": 640,
                    "height": 612,
                    "top": 186.23333740234375,
                    "right": 1040,
                    "bottom": 798.2333374023438,
                    "left": 400
                }
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

                    description.innerHTML="description"
                    description.classList.add("line")
                    description.style.top = YY-10;
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

                    description.innerHTML="description"
                    description.classList.add("line")
                    description.style.top = YY-10;
                    description.style.heigth = 1;
                    description.style.left = XX + (-element.eventClientX + rect.right) + 57 ;
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

        // var composant = [];

        // function getXandY() {
        //     var rect = event.target.getBoundingClientRect();
        //     var XX = event.clientX - rect.left; //x position within the element.
        //     var XX_R = event.clientX - rect.right; //x position within the element.
        //     var YY = event.clientY - rect.top; //y position within the element.
        //     console.log("Left? : " + XX + " ; Top? : " + YY + ".");
        //     let H = window.innerHeight;
        //     let W = window.innerWidth;
        //     console.log(H, W);
        //     console.log(event);
        //     let x = event.clientX;
        //     let y = event.clientY;
        //     let line = document.getElementById("lines");
        //     let div = document.createElement("div");
        //     let span = document.createElement("span");

        //     let locations = {
        //         "event.clientX": event.clientX,
        //         "event.clientY": event.clientY,
        //         "XX": XX,
        //         "YY": YY,
        //         "rect": rect
        //     }

        //     composant.push(locations);
        //     console.log(composant);

        //     console.log(locations);

        //     if (event.clientX < screen.width / 2) {

        //         div.innerHTML += "";
        //         div.classList.add("line")
        //         div.style.top = YY;
        //         div.style.heigth = 1;
        //         div.style.width = XX + 47;
        //         div.style.left = -50;
        //         div.style.border = "1px solid";
        //         div.style.zIndex = 200;
        //         line.appendChild(div);

        //         span.classList.add("dot")
        //         span.style.top = YY - 2;
        //         span.style.heigth = 1;
        //         span.style.left = XX - 3;
        //         span.style.zIndex = 200;
        //         span.style.position = "absolute";
        //         line.appendChild(span);

        //     } else {

        //         div.innerHTML += "";
        //         div.classList.add("line")
        //         div.style.top = YY;
        //         div.style.heigth = 1;
        //         div.style.width = 47 - (event.clientX - rect.right);
        //         div.style.left = XX;

        //         div.style.border = "1px solid";
        //         div.style.zIndex = 200;
        //         line.appendChild(div);

        //         span.classList.add("dot")
        //         span.style.top = YY - 2;
        //         span.style.heigth = 1;
        //         span.style.left = XX - 3;
        //         span.style.zIndex = 200;
        //         span.style.position = "absolute";
        //         line.appendChild(span);

        //     }


        //     console.log("x =" + x + ", y=" + y);
        // }
        });
    </script>
@endsection
