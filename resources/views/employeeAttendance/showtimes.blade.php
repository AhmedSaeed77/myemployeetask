@extends('layouts.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
@endsection

@section('content')

<div class="container" id="types">
    <h1></h1>
    <label class="form-label">Employee Times</label>
    <form class="needs-validation was-validated" id="createEmployee">
        <fieldset class="form-fieldset">
            <div class="mb-3">
                <label class="form-label required">Attendance</label>
                <input type="text"  v-model="start"  name="start" value="{{ $attendace->created_at->format('Y-m-d H:i:s') }}" class="form-control"  autocomplete="off"/>
            </div>
            <div class="mb-3">
                <label class="form-label required">Departure</label>
                <input type="text" v-model="end" name="end" value="{{ $attendace->updated_at->format('Y-m-d H:i:s') }}" class="form-control"  autocomplete="off"/>
            </div>
        </fieldset>
    </form>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
@include('vue')

    
    
@endsection
