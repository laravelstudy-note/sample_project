@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
					Bladeのみで描画
				</div>

                <div class="card-body">
					<div class="calendar">
					@include('calendar_table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
