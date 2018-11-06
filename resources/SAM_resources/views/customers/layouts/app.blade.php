@extends('customers.layouts.base')

@section('body')

{{-- Navigation --}}
@include('includes.nav')

{{-- Site Wrapper --}}
<div class="site_wrapper" style="padding-top: 50px;">
	@yield('content')

</div>

@include('includes.footer')
@stop