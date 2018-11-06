@extends('layouts.base')

@section('body')

{{-- Navigation --}}
@include('includes.nav')

{{-- Site Wrapper --}}
<div class="site_wrapper" style="padding-top: 200px;">
	@yield('content')
	{{-- when add, notify display right above footer --}}
	<div class="notify text-center">

	</div>
</div>

@include('includes.footer')
@stop