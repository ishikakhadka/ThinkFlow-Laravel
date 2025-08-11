@extends('layout.layout')

@section('content')


  <div class="row">
            <div class="col-3">

@include('shared.success-message')

               @include('layout.side-bar')
            </div>
            <div class="col-6">




                <div class="mt-3">
               @include('shared.user-edit-card')
                </div>
                 <hr>
                 @forelse($ideas as $idea )
                <div class="mt-3">
                  @include('shared.idea-card')
                </div>
                @empty
                <p class="text-center mt-4">NO IDEAS FOUND.</p>
                @endforelse
                   <div class=mt-3>
                       {{$ideas->withQueryString()->links()}}
                     </div>



            </div>
            <div class="col-3">
                @include('shared.search-bar')
              @include('shared.follow-box')
            </div>
        </div>
        @endsection
