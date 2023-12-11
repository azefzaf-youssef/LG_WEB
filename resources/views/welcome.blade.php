@extends('layout.master')

@section('content')
    <!-- Specific content for this page -->

    <div class="container bg-white p-5 ">
        <div class="row">
          <div class="col-2 title-4 description-titles txt-rg" >
            2x
            <div class="sub-title-class">
                class : title-1
            </div>
          </div>
          <div class="col-2  title-2 description-titles">
            Unleashing Creativity: A Journey into Infinite Imagination
            <div class="sub-title-class">
                class : title-2
            </div>

            <div class="title-3 sub-description-titles">
                is a transformative template designed to ignite your creative spark and explore the boundless realms of imagination. Whether you're an artist, writer, designer, or simply seeking inspiration, this template offers a guided expedition into uncharted territories of innovative thinking.
            </div>
            <div class="sub-title-class">
              class : title-3
          </div>
          </div>
          <div class="col-6 description-titles title-4 ">
            JUMBLED <br/> SENTENCE CREATE FASCINATING PUZZLE.<br/> THE SKY IS<br/> PAINTED WITH VIBRANT.
            <div class="sub-title-class">
              class : title-4
          </div>
         </div>

          <div class="col-1 description-titles txt-rg">

            <button type="button" class="btn btn-orange">Orange</button>
            <div class="sub-title-class txt-lt">
              class: btn-orange
            </div>
          </div>


        </div>
      </div>
@endsection


@section('styles')
    <!-- Additional styles for this page -->
    <style>
        .description-titles{
            padding-top:80px;
            line-height: 1;
        }

        .sub-description-titles{
            padding-top:20px;
            line-height: 1;
        }


    </style>
@endsection
