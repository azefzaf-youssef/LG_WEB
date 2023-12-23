@extends('layout.master')

@section('content')
    <div class="container  p-3 header-block  rounded mb-4  shadow">
        <h4> Titre : <i>{{ $illustration->titre }} </i></h4>
        Langue : <span>{{ $illustration->langue->langue }}</span><br>

    </div>
    <div class="container bg-white p-5 rounded shadow ">
        <div class="d-flex justify-content-md-between">

            <div class="title-2 pb-4">Termenoligie</div>




            <div class="btn-group" role="group">

                <x-ri-add-fill class=" icon-info-btn btn   "  style=" margin-right:3px; "/>

                <x-carbon-translate class="icon-info-btn btn  dropdown-toggle " id="btnGroupDrop1"
                    data-toggle="dropdown" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false" />
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    @foreach ($langues as $langue )
                    <li><a class="dropdown-item @if ($langue->id == $illustration->id_langue) active @endif" href="#">{{$langue->langue }}</a></li>

                    @endforeach

                </ul>
            </div>


        </div>

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

            var composant = @json($composants);

            showComposant(null, null, composant);

        });
    </script>
@endsection
