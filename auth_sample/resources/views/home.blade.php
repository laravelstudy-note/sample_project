@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">記事一覧ページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

					記事一覧を表示予定

					<div>
						<a class="btn btn-primary" href="{{ url('manage/create')}}">新規作成</a>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
