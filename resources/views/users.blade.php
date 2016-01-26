@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 20px">
            <div class="col-sm-1 header">Pp</div>
            <div class="col-sm-7 header">Email</div>
            <div class="col-sm-2 header text-center">Created at</div>
            <div class="col-sm-2 header text-center">Actions</div>
        </div>
        @foreach ($users as $user)
            <div class="row" data-user-id="{{ $user->id }}">
                <div class="col-sm-1 table-row">{{ $user->id }}</div>
                <div class="col-sm-7 table-row">{{ $user->email }}</div>
                <div class="col-sm-2 table-row text-center">{{ $user->created_at }}</div>
                <div class="col-sm-2 table-row text-center">
                    <a href="#"><i class="fa fa-user-times"></i></a>
                </div>
            </div>
        @endforeach
        <div class="row" style="margin-top: 20px; margin-bottom: 50px">
            <div class="col-sm-12 text-center">
                {!! $users->render() !!}
            </div>
        </div>
    </div>
@stop