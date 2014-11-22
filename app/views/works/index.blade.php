@extends('layouts.default')

@section('title')
    {{{ $title }}}
@stop

@section('keywords')Posts administration @stop
@section('author')Laravel 4 Bootstrap Starter SIte @stop
@section('description')Posts administration index @stop


@section('content')
	<div class="ban clear-fix">
		<div class="ban_gray">
			<div class="col2">
				<h1><span class="ban_text">Блог</span></h1>
			</div>
		</div>
		<div class="ban_orange">
			<div class="col2">
				<div class="triangle"></div>
			</div>
		</div>
	</div>
	<div class="content clear-fix">
	    <div class="main">
			<div class="line"></div>
      @foreach ($works as $work)
	    	<div class="article clear-fix">
	    		<img src="{{ $work->preview->url('medium') }}" alt="" class="article_img">
	    		<div class="article_container">
		    		<h2><a class="article_header" href="{{ URL::route('works.show', $work->slug) }}">{{ $work->title }}</a></h2>
		    		<p class="description"> {{ Str::limit($work->content, 100) }} </p>
					<p class="date">{{ $work->created_at() }}</p>
          @if ($work->tagNames() != [])
					    Тэги:
              {{ implode(", ", array_map(function($name) {
                    return '<a href="/blogs?tag='.$name.'" class="tag">'.$name.'</a>';
                }, $work->tagNames())) }}
          @endif
					<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus"></div>
	    		</div>
	    	</div>
      @endforeach
	    </div>
	    <div class="sidebar">
	    	<div class="input_search_block">
            {{ Form::open(['url' => '/blogs', 'method' => 'get']) }}
				        <input type="text" name="search" placeholder="Поиск"class="input input_search">
				        <button class="input_search_button" type="submit"></button>
            {{ Form::close() }}
			</div>
    		<p>Выбор рубрики:</p>
        @foreach ($rubrics as $rubric)
    		    <a href="/blogs?rubric={{ $rubric->name }}">{{ $rubric->name }}</a>
        @endforeach
    		<p>Подписаться на статьи.<br>
			Я хочу быть в курсе<br>
			последних статей</p>
			<input class="input input_email" placeholder="Ваш e-mail">
			<button class="button button_active">Подписаться</button>
	    </div>
	</div>

<?php $paginator = $works; ?>
@include('components.pagination')
@stop


@section('styles')
	  <link rel="stylesheet" href="{{	asset('assets/css/blog.css') }}">
@stop
