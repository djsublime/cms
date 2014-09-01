<table class="table">
	@foreach($data as $key => $value)
	<tr>
		<td>{{$key}}</td>
		@if(is_array($value))
		<td><code style="white-space:normal;">{{json_encode($value)}}</code></td>
		@else
		<td><code style="white-space:normal;">{{$value}}</code></td>
		@endif
	</tr>
	@endforeach
</table>

