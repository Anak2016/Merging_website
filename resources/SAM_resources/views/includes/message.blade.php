<div class="column">


	@if(isset($errors) && count($errors) || \SAM\Classes\Session::has('error') )
		<div class="callout alert" data-closable>
			@if(\SAM\Classes\Session::has('error'))
				{{\SAM\Classes\Session::flash('error')}}
			@else
				@foreach($errors as $error_array)
					@foreach($error_array as $error_item)
						{{$error_item}}<br/> 
					@endforeach
				@endforeach
			@endif

			<button class="close-button" arial-label="Dismiss Message" type="button" data-close>
				<span arial-hidden="true">&times;</span>
			</button>
		</div>
	@endif

	@if(isset($success) || \SAM\Classes\Session::has('success'))
		<div class="callout success" data-closable>
			@if(isset($success))
				{{$success}}
			@elseif(\SAM\Classes\Session::has('success'))
				{{ \SAM\Classes\Session::flash('success') }}
			@endif

			<button class="close-button" arial-label="Dismiss Message" type="button" data-close>
				<span arial-hidden="true">&times;</span>
			</button>
		</div>
	@endif

</div>