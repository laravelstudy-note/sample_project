@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">管理側TOP</div>
		<div class="card-body">

			<div class="mb-3">
				<a href="{{ url('admin/user_list') }}" class="btn btn-primary">ユーザー一覧</a>

				<a href="{{ url('admin/user/create') }}" class="btn btn-primary">ユーザー作成</a>
			</div>
			
			<form method="post" action="{{ url('admin/logout') }}">
				@csrf
				<input type="submit" class="btn btn-danger" value="ログアウト" />
			</form>
		</div>
	</div>
</div>
@endsection