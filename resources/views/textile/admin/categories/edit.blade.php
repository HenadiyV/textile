@extends('layouts.app')
@section('content')
@php
/** @var \App\Models\TextileCategory $category */
@endphp
@if($category->exists)
        <form method="POST" action="{{route('textile.admin.categories.update',$category->id)}}">
        @method('PATCH')
    @else
        <form method="POST" action="{{route('textile.admin.categories.store')}}">
     @endif
        @csrf

    <div class="container">
        @php
            /** @var \Illuminate\Support\ViewErrorBag $errors */
        @endphp
        @if($errors->any())
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="alert alert-danger" role="alert">
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                        {{$errors->first()}}

                    </div>
                </div>
            </div>
            @endif
     @if(session('success'))
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="alert alert-success" role="alert">
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                        {{session()->get('success')}}

                    </div>
                </div>
            </div>
            @endif
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('textile.admin.categories.includes.item_edit_main_col')
            </div>
            <div class="col-md-3">
                @include('textile.admin.categories.includes.item_edit_add_col')
            </div>
        </div>
    </div>
</form>
@endsection