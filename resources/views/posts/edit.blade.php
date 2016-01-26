@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 header">
                @if ($post->id)
                    <h4>Editing Post: {{ $post->title }}</h4>
                @else
                    <h4>Creating new Post</h4>
                @endif
            </div>
        </div>
        <form method="post" action="">
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ $post->title }}">
                    <textarea class="form-control" style="height: 200px; margin-top: 5px" name="description" placeholder="Enter description">{{ $post->description }}</textarea>
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12" style="text-align: right">
                    <input type="checkbox" name="is_active" value="1" @if ($post->is_active == 1) checked @endif> Active&nbsp;&nbsp;
                    {!! csrf_field() !!}
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
        @if ($post->comments()->count() > 0)
            <div class="row" style="margin-top: 30px">
                <div class="col-sm-12 header"><h4>Comments</h4></div>
            </div>
            @foreach ($post->comments()->get() as $comment)
                <div class="row" data-comment-id="{{ $comment->id }}">
                    <div class="col-sm-11 table-row">
                        <b>Author: </b>{{ $comment->author }}<br>
                        {{ $comment->description }}
                    </div>
                    <div class="col-sm-1 table-row">
                        @if ($comment->is_active == 0)
                            <a href="#"><i class="fa fa-eye"></i></a>&nbsp;
                        @else
                            <a href="#"><i class="fa fa-eye-slash"></i></a>&nbsp;
                        @endif
                        <a href="#"><i class="fa fa-trash-o"></i></a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@stop