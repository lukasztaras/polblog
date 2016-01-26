@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4>Select post you wish to edit<a class="btn btn-default pull-right" href="{{ route('get-post-edit') }}">Add new</a></h4>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col-sm-1 header">Pp</div>
            <div class="col-sm-2 header">Title</div>
            <div class="col-sm-5 header">Description</div>
            <div class="col-sm-1 header text-center">Created at</div>
            <div class="col-sm-1 header text-center">Status</div>
            <div class="col-sm-2 header text-center">Actions</div>
        </div>
        @foreach ($posts as $post)
            <div class="row" data-post-id="{{ $post->id }}">
                <div class="col-sm-1 table-row">{{ $post->id }}</div>
                <div class="col-sm-2 table-row">{{ $post->title }}</div>
                <div class="col-sm-5 table-row">{{ str_limit($post->description, 70) }}</div>
                <div class="col-sm-1 table-row text-center">{{ $post->created_at }}</div>
                <div class="col-sm-1 table-row text-center">
                    @if ($post->is_active == 0)
                        <i class="fa fa-times"></i>
                    @else
                        <i class="fa fa-check"></i>
                    @endif
                </div>
                <div class="col-sm-2 table-row text-center">
                    @if ($post->is_active == 0)
                        <a href="#"><i class="fa fa-toggle-on"> </i></a>&nbsp;
                    @else
                        <a href="#"><i class="fa fa-toggle-off"> </i></a>&nbsp;
                    @endif
                    <a href="{{ route('get-post-edit', ['id' => $post->id]) }}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                    <a href="#"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        @endforeach
        <div class="row" style="margin-top: 20px; margin-bottom: 50px">
            <div class="col-sm-12 text-center">
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
@stop