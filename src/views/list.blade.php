@if($array)
	<ul class="sitemap-items">
	@foreach($array as $item) 
		<li class="sitemap-item">
		@if($item['link'])
			<a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
		@else
			{{ $item['name'] }}
		@endif
		@if($item['children'])
			@include('sitemap::list',array('array' => $item['children']))
		@endif
		</li>
	@endforeach
	</ul>
@endif