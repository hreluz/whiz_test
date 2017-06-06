<table class="table table-striped">
	<tr>
		<td>ID</td>
		<td>Title</td>
		<td>Content</td>
	</tr>
	@foreach($posts as $post)
		<tr>
			<td>{{ $post->id }}</td>
			<td>{{ $post->title }}</td>
			<td>{{ $post->content }}</td>
		</tr>
	@endforeach
</table>