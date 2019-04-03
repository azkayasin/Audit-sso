<!DOCTYPE html>
<html>
<head>
	@include('admin.template.head')
</head>
<body>

	<div class="box-body">
		<form action="{{url('/temuan/update')}}" method="get" id="tambah_kda" enctype="multipart/form-data">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>no</th>
						<th>kwitansi</th>
						<th>nominal</th>
						<th>keterangan</th>
						<th>id kda</th>
						<th>Status</th>
						<th>Konfirmasi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($temuan as $temuan)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $temuan->kwitansi}}</td>
						<td>{{ $temuan->nominal}}</td>
						<td>{{ $temuan->keterangan}}</td>
						<td>{{ $temuan->kda_id}}</td>
						@if ($temuan->status == 0)
						<td>Salah</td>
						<td><input type="checkbox" name="checkbox[]" data-id="{{$temuan->id}}" value="{{$temuan->id}}" id="checkbox[]"> </td>
						@else
						<td>Benar</td>
						<td>Sudah terkonfirmasi </td>
						@endif
					</tr>
					@endforeach
				</tfoot>
			</table>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
	@include('admin.template.setting')
</body>
</html>