@extends('core::template')

@section('title','Sitemap')

@section('content')
<main class="sitemap">
	<div class="row">
		@include('sitemap::list')
	</div>
</main>
@stop