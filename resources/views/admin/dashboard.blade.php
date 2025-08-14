@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        <div class="card overflow-hidden">
            @include('admin.shared.side-bar')
        </div>
    </div>

    <div class="col-9">
        <h2 class="text-warning">Admin Dashboard</h2>
        <div class="row">

            <div class="col-sm-6 col-md-4 mt-3">
                @include('admin.widget',[
                    'title'=>'Total Users',
                    'icon'=>'fas fa-users',
                    'data'=>$users->count(),
                    'bgClass'=>'bg-primary'
                ])
            </div>

            <div class="col-sm-6 col-md-4 mt-3">
                @include('admin.widget',[
                    'title'=>'Total Ideas',
                    'icon'=>'fas fa-brain',
                    'data'=>$ideas->count(),
                    'bgClass'=>'bg-success'
                ])
            </div>

            <div class="col-sm-6 col-md-4 mt-3">
                @include('admin.widget',[
                    'title'=>'Total Comments',
                    'icon'=>'fas fa-comment',
                    'data'=>$comments->count(),
                    'bgClass'=>'bg-warning'
                ])
            </div>

        </div>
    </div>
</div>
@endsection
