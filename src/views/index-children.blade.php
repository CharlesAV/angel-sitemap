@if($array)
	<ul class="sitemap-items">
	@foreach($array as $item) 
		<li class="sitemap-item">
		@if(isset($item['link']))
			<a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
		@else
			{{ $item['name'] }}
		@endif
		@if(isset($item['children']))
			@include('sitemap::index-children',array('array' => $item['children']))
		@endif
		</li>
	@endforeach
	</ul>
@endif