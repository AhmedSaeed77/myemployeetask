@extends('layouts.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
@endsection

@section('content')

<div class="container">Hello in Employee System </div>


@endsection

@section('js')
<script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
@include('vue')
    
@endsection
