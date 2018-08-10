@extends('layouts.app')

@section('title')
	Currency Conversion
@endsection

@section('stylesheet')
	<!-- Laravel Javascript Validation -->
	<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
	{!! $validator !!}
@endsection

@section('content')
<div class="container main-container">
	<!-- Panel start -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Convert Currency</h2>
		</div>
		<!-- Panel body start -->
		<div class="panel-body">
			<!-- Currency conversion form start -->
			<form class="form-horizontal" action="{{ route('convert_currency') }}" method='POST'>
				@csrf
				<div class="form-group">
					<label class="control-label col-sm-4" for="base_currency">Base currency:<span class="red">*</span></label>
					<div class="col-sm-4">
						<input type="hidden" name="base_currency_symbol" class="base_currency_symbol">
						<select class="form-control" name="base_currency" id="base_currency">
							<option value="">Select</option>
							@foreach($symbole_ar as $key => $value)
								<option value="{{ $value }}" {{ ( old('base_currency') == $key ? 'selected':'') }}>{{ $key }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="base_amount">Base amount:<span class="red">*</span></label>
					<div class="col-sm-4">
						<input type="number" step="0.01" min="1" class="form-control" id="base_amount" placeholder="Enter base amount" name="base_amount" value="{{ old('base_amount') }}" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-4" for="target_currency">Target currency:<span class="red">*</span></label>
					<div class="col-sm-4">
						<input type="hidden" name="target_currency_symbol" class="target_currency_symbol">
						<select class="form-control" name="target_currency" id="target_currency">
							<option value=''>Select</option>
							@foreach($symbole_ar as $key => $value)
								<option value="{{ $value }}" {{ ( old('target_currency') == $key ? 'selected':'') }}>{{ $key }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">        
					<div class="col-sm-offset-4 col-sm-8">
						<button type="submit" class="btn btn-primary">Convert</button>
					</div>
				</div>
			</form>
			<!-- Currency conversion form end -->
		</div>
		<!-- Panel body end -->
	</div>
	<!-- Panel end -->
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('#base_currency').change(function(){
					if($(this).val()){
							var selected_opt = $("#base_currency option:selected").html();
							$('.base_currency_symbol').val(selected_opt);
					}else{
							$('.base_currency_symbol').val('');
					}
        });

				$('#target_currency').change(function(){
					if($(this).val()){
							var selected_opt = $("#target_currency option:selected").html();
							$('.target_currency_symbol').val(selected_opt);
					}else{
							$('.target_currency_symbol').val('');
					}
        });

				$('#base_currency, #target_currency').change();
				
				$('.btn-primary').click(function(){
					$('.error-help-block').each(function(){
						if($(this).text != '' ){
							$(this).show();
						}
					});
				});
    });
</script>

@endsection