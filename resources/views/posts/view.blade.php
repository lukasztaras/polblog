@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 header">
                <h4>{{ $post->title }} <span class="small">Published {{ $post->created_at }}</span></h4>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-sm-10 col-sm-offset-1">
                {{ $post->description }}
            </div>
        </div>
        <div class="row" style="margin-top: 30px">
            <div class="col-sm-10 col-sm-offset-1 header"><h4>Comments</h4></div>
        </div>
        @foreach ($post->comments()->where('is_active', 1)->get() as $comment)
            <div class="row" data-comment-id="{{ $comment->id }}">
                <div class="col-sm-10 col-sm-offset-1 table-row">
                    <b>Author: </b>{{ $comment->author }}<span class="pull-right"><b>Created: </b>{{ $comment->created_at }}</span><br>
                    {{ $comment->description }}
                </div>
            </div>
        @endforeach
        @if (Auth::user())
            <div class="row" data-post-id="{{ $post->id }}">
                <div class="col-sm-10 col-sm-offset-1">
                    <textarea class="form-control" name="comment" placeholder="Enter comment" style="height: 100px; margin-top: 5px"></textarea>
                    {!! csrf_field() !!}
                    <button class="btn btn-primary add-comment pull-right" style="margin-top: 5px">Add Comment</button>
                </div>
            </div>
        @else
            <div class="row" data-post-id="{{ $post->id }}">
                <div class="col-sm-10 col-sm-offset-1">
                    <span style="background-color: #f2f2f2; border-radius: 5px; padding: 5px">Unable to comment. Please log in</span>
                </div>
            </div>
        @endif
    </div>
@stop