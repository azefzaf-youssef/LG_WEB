@extends('layout.master')

@section('content')
    <div class="container">

        <div class="container bg-white p-5 rounded-left shadow ">
            <div class="title-2 pb-4">Termenoligie</div>


            <div class="row ">
                <div class="col"></div>

                <div class=" col ">
                    <div class="card card-img ">
                        <div id="lines">
                            <img id="images" onclick="getXandY()" src="images.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="col"></div>

            </div>
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

        function getXandY() {
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
            let line = document.getElementById("lines");
            let div = document.createElement("div");
            let span = document.createElement("span");

            if (rect.left > XX - 50) {

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

                div.innerHTML += "";
                div.classList.add("line")
                div.style.top = YY;
                div.style.heigth = 1;
                div.style.width = 47 - (event.clientX - rect.right);
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


            console.log("x =" + x + ", y=" + y);
        }
    </script>
@endsection
