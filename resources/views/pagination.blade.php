<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<tr>
			<th width="10%">ID</th>
			<th width="40%">Name</th>
			<th width="50%">Email</th>
		</tr>
		@foreach($data as $row)
		<tr>
			<td>{{ $row->id }}</td>
			<td>{{ $row->amount }}</td>
			<td>{{ $row->created_at }}</td>
		</tr>
		@endforeach
	</table>

{!! $data->links() !!}