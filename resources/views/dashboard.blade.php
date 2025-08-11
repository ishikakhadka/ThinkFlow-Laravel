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
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
                 @empty
                     <p>No Ideas Found.</p>
            @endforelse
            <div class=mt-3>
                {{ $ideas->withQueryString()->links() }}
            </div>

        </div>
        <div class="col-3">
            @auth
            @include('shared.search-bar')
            @include('shared.follow-box')
            @endauth


        </div>
    </div>
@endsection
