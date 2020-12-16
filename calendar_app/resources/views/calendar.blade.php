@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
					{{ $calendar->getTitle() }}
					<a href="{{ route('calendar',['date' => $calendar->prevMonth()->format('Y-m-d') ]) }}">{{ $calendar->prevMonth()->format('Y-m-d') }}</a>
					<a href="{{ route('calendar',['date' => $calendar->nextMonth()->format('Y-m-d') ]) }}">{{ $calendar->nextMonth()->format('Y-m-d') }} </a>
				</div>

                <div class="card-body">
					{!! $calendar->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
