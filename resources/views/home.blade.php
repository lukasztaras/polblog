@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-sm-10 col-sm-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->title }} <span class="pull-right">Comments: {{ $post->comments()->count() }}</span></div>
                    <div class="panel-body">
                        {{ str_limit($post->description, 400) }}
                        <p style="text-align: right; margin: 0px; margin-top: 5px">
                            <a href="{{ route('get-story', ['id' => $post->id]) }}" class="btn btn-primary">See more ...</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            {!! $posts->render() !!}
        </div>
    </div>
</div>
@endsection
