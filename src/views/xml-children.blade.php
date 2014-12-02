@if($array)
	@foreach($array as $item) 
		@if(isset($item['link']))
	<url>
		<loc>{{ url($item['link']) }}</loc> 
	</url>
		@endif
		@if(isset($item['children']))
			@include('sitemap::xml-children',array('array' => $item['children']))
		@endif
	@endforeach
@endif