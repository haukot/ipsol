@extends('admin.layouts.default')

@section('title')
    {{{ $title }}} :: @parent
@stop


@section('content')
    @include('components.admin_header', ['title' => $title, 'route' => URL::route("admin.banners.index")])
    {{ Former::framework('TwitterBootstrap3') }}
    {{ Former::populate($banner) }}
    {{ Former::open_for_files()->method('PUT')->route('admin.banners.update', $banner->id) }}

    @include('admin.banners.form')

    {{ Former::close() }}
@stop
