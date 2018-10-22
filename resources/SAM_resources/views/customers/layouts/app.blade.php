@extends('customers.layouts.base')

@section('body')

{{-- Navigation --}}
@include('includes.nav')

{{-- Site Wrapper --}}
<div class="site_wrapper">
	@yield('content')

</div>

@include('includes.footer')
@stop