@extends('layout.master')

@section('content')
    <!-- Specific content for this page -->


    <div class="container  mt-5">
        <div class="row  mx-auto  mt-4 title-2">
            Button
        </div>

        <div class="row mt-4 ">
            <div class="col-1 title-1 description-titles txt-rg">


                <button type="button" class="btn btn-orange">Orange</button>
                <div class="sub-title-class">
                    class : btn-orange
                </div>

            </div>
            <div class="col-1 title-1 description-titles txt-rg">
                <button type="button" class="btn btn-primary">Primary</button>
                <div class="sub-title-class">
                    class : btn-primary
                </div>
            </div>
            <div class="col-1 title-1 description-titles txt-rg">
                <button type="button" class="btn btn-info ">Info</button>
                <div class="sub-title-class">
                    class : btn-info
                </div>
            </div>
            <div class="col-1 title-1 description-titles txt-rg">
                <button type="button" class="btn btn-secondary">Secondary</button>
                <div class="sub-title-class">
                    class : btn-secondary
                </div>
            </div>
            <div class="col-1 title-1 description-titles txt-rg">
                <button type="button" class="btn btn-success">Success</button>
                <div class="sub-title-class">
                    class : btn-success
                </div>
            </div>

            <div class="col-1 title-1 description-titles txt-rg">

            </div>


            <div class="col-2 description-titles">

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

            </div>


        </div>

        <div class="row mt-4 ">
            <div class="col-1 title-1 description-titles txt-rg">
                <button type="button" class="btn btn-danger">Danger</button>
                <div class="sub-title-class">
                    class : btn-danger
                </div>
            </div>
            <div class="col-1 title-1 description-titles txt-rg">
                <button type="button" class="btn btn-warning">Warning</button>
                <div class="sub-title-class">
                    class : btn-warning
                </div>
            </div>

            <div class="col-1 title-1 description-titles txt-rg">
                <button type="button" class="btn btn-light">Light</button>
                <div class="sub-title-class">
                    class : btn-light
                </div>
            </div>

            <div class="col-1 title-1 description-titles txt-rg">
                <button type="button" class="btn btn-dark">Dark</button>
                <div class="sub-title-class">
                    class : btn-dark
                </div>
            </div>

            <div class="col-1 title-1 description-titles txt-rg">
                <button type="button" class="btn btn-link">Link</button>
                <div class="sub-title-class">
                    class : btn-link
                </div>
            </div>
            <div class="col-1 title-1 description-titles txt-rg">
            </div>

            <div class="col-2 description-titles">



                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row  mx-auto  mt-4 title-2">
            Button group
        </div>

        <div class="row mt-4 ">
            <div class="col-1 title-1 description-titles txt-rg">


                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                    </ul>
                </div>
                <div class="sub-title-class">
                    class : btn-group
                </div>
            </div>


        </div>
    </div>
@endsection


@section('styles')
    <!-- Additional styles for this page -->
    <style>
        .description-titles {
            padding-top: 0px;
            line-height: 1;
        }

        .sub-description-titles {
            padding-top: 20px;
            line-height: 1;
        }
    </style>
@endsection
