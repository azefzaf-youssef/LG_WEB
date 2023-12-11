@extends('layout.master')

@section('content')
    <!-- Specific content for this page -->

    <div class="container bg-white p-5 ">
        Hi {{ $user->names }}
    </div>
@endsection


@section('styles')
    <!-- Additional styles for this page -->
    <style>
        .description-titles {
            padding-top: 80px;
            line-height: 1;
        }

        .sub-description-titles {
            padding-top: 20px;
            line-height: 1;
        }
    </style>
@endsection
