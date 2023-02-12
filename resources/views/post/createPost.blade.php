@extends('layouts.master')

@section('content')
@include('layouts.menu')
<div class="container jumbotron mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Post ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('blogPost') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="discripsion"
                                class="col-md-4 col-form-label text-md-end">{{ __('Your Post') }}</label>

                            <div class="col-md-6">
                                <textarea id="discripsion" type="text" rows="5"
                                    class="form-control @error('discripsion') is-invalid @enderror" name="discripsion"
                                    value="{{ old('') }}discripstion" required autocomplete="discripstion"></textarea>

                                @error('discripsion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" id="custId" name="user_id">

                        < <div class=" row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection