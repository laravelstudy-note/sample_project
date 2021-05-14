<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
	<div id="app"></div>
</div>

<script>
//URLを渡す
var TODO_API_LIST = "{{ url('/todo/list') }}";
var TODO_API_CREATE = "{{ url('/todo/create') }}";
var TODO_API_FINISH = "{{ url('/todo/finish') }}";
var TODO_API_CLEAR = "{{ url('/todo/clear_finish') }}";

//CSRFを渡す
var TODO_API_CSRF = "{{ csrf_token() }}";
</script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>