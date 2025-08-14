@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">

            @include('shared.success-message')
            {{-- @include('shared.error-message') --}}

            <div class="card overflow-hidden">

                @include('layout.side-bar')

            </div>

        </div>
        <div class="col-6">

            @include('shared.submit-ideas')
            <hr>
            <h4 class="text-center mb-4 text-danger">TOP 10 TRENDING POSTS.</h4>
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
                 @empty
                     <p>No Ideas Found.</p>
            @endforelse


        </div>
        <div class="col-3">
            @auth

            @include('shared.follow-box')
            @endauth


        </div>
    </div>
@endsection
