@extends('layouts.master')



@section('content')
@include('layouts.menu')
<div class="py-4"></div>
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-5 col-lg-9 mb-lg-0">
                <article>
                    <div class="mb-4 post-slider">
                        <img class="w-100" src="/images/blog.jpg" alt="Card image cap">
                    </div>

                    <h1 class="h2">{{$posts->implode('title')}}</h1>
                    <ul class="my-3 card-meta list-inline">
                        <li class="list-inline-item">
                            <i class="ti-calendar"></i>{{$posts->implode('created_at')}}
                        </li>
                        <li class="list-inline-item">
                            <b class="text-primary">{{$posts->implode('name')}}</b>
                        </li>
                    </ul>

                    <div class="content">
                        <p>
                            {{$posts->implode('discripsion')}}
                        </p>
                    </div>
                </article>

            </div>

            <div class="col-lg-9 mt-4 col-md-12">
                <div class="pt-5 mt-4 mb-5 border-top">
                    <h3 class="mb-4">Comments</h3>
                    @foreach ($comments as $comment)
                    <div class="pb-4 mb-4 media d-block d-sm-flex">

                        <div class="media-body">
                            <a href="#!" class="mb-3 h4 d-inline-block">{{ $comment->name }}</a>
                            <p>
                                {{$comment->comment}}
                            </p>
                            <small class="mr-3 text-black-600 font-weight-600">
                                {{ date('d M Y', strtotime($comment->created_at)) }}
                            </small>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div>
                    <h3 class="mb-4 ">Leave a Reply</h3>
                    <form action="{{ route('comment',$posts->implode('id')) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="shadow-none summernote form-control" name="comment" rows="7"
                                required></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Comment Now</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection