@extends('layouts.app')

@section('title')
	Neuro Flash - Result
@endsection

@section('content')
<div class="container main-container">
	<!-- Panel start -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Currency Conversion Result:-</h2>
		</div>
		<!-- Panel body start -->
		<div class="panel-body">
			<p class="cur_res">{{ $base_amount }} {{ $base_currency }} = {{ $target_amount }} {{ $target_currency}}</p>
			<a class="btn btn-primary" href="/">Go Back</a>
		</div>
		<!-- Panel body end -->
	</div>
	<!-- Panel end -->
</div>
@endsection