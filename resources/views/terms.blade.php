@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">



            <div class="card overflow-hidden">

                @include('layout.side-bar')

            </div>

        </div>
        <div class="col-6">


            <h1>TERMS</h1>
            <p>Terms and conditions, also known as terms of service or terms of use, are a legally binding agreement between
                a
                service provider and its users. They outline the rules, guidelines, and restrictions for using a website,
                app, or
                other service. These agreements protect the service provider's rights, inform users of their
                responsibilities, and
                can help prevent disputes. </p>

        </div>
        <div class="col-3">
            {{-- @include('shared.search-bar') --}}
            {{-- @include('shared.follow-box') --}}
        </div>
    </div>
@endsection
