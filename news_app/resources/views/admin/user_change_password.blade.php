@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<a href="{{ url('admin/user_list') }}">ユーザー一覧</a> 
			&gt; <a href="{{ url('admin/user/' . $user->id) }}">{{ $user->name }}</a> 
			&gt; パスワード変更
		</div>
		<div class="card-body">
			
			<h5>{{ $user->name }}のパスワードの変更</h5>

			<form method="post" action="{{ url('admin/user/change_password/' . $user->id) }}">
				@csrf 
				
				<table class="table table-bordered">
				<tr>
					<th>パスワード</th>
					<td>
						<input class="form-control" type="password" name="password" value="{{old('password')}}" />
					</td>
				</tr>
				<tr>
					<th>パスワード（確認）</th>
					<td>
						<input class="form-control" type="password" name="password_confirmation" value="" />
					</td>
				</tr>
				</table>

				<div class="mt-3 text-center">
					<input class="btn btn-danger" type="submit" value="パスワード変更" />
				</div>

			</form>
		</div>
	</div>
</div>
@endsection