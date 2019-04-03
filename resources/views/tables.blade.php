<!DOCTYPE html>
<html>
<head>
	<title>Tables</title>
</head>
<body>
	{{-- @foreach($account as $acc)
	<ul>
		<li>{{ $acc->detail}}</li>
		@if($acc->children_accounts)
		@foreach($acc->children_accounts as $acc2)
			{!! $acc2->printMaster($acc2) !!}
		@endforeach
		@endif
	</ul>
	@endforeach --}}
	{!! $account !!}
</body>
<head>
</head>
</html>