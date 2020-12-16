<html>
<head>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<section class="container mx-auto py-4">
	<h1>検索フォーム</h1>

	<form method="get" actino="{{ route('customer_search') }}">
		@csrf

		<table class="table-auto border border-gray-600">
			<thead></thead>
			<tbody>
				<tr>
					<td class="border border-gray-600 py-1 px-1">名前: <input class="mt-1 ml-3 py-1 border border-gray-300 bg-white rounded-md sm:text-sm" type="text" name="search[name]" value="{{ $condition->name }}" /></td>
					<td class="border border-gray-600 py-1 px-1">ヨミガナ: <input class="mt-1 ml-3 py-1 border border-gray-300 bg-white rounded-md sm:text-sm" type="text" name="search[reading]" value="{{ $condition->reading }}" /></td>
				</tr>
				<tr>
					<td class="border border-gray-600 py-1 px-1">住所: <input class="mt-1 ml-3 py-1 border border-gray-300 bg-white rounded-md sm:text-sm" type="text" name="search[address]" value="{{ $condition->address }}" /></td>
					<td class="border border-gray-600 py-1 px-1">
						血液型: 
						<select class="mt-1 ml-3 py-1 border border-gray-300 bg-white rounded-md sm:text-sm" name="search[bloodtype]">
							<option value="">未選択</option>
							@foreach(["A","B","O","AB"] as $type)
							<option value="{{ $type }}"
							@if ($type == $condition->bloodtype)
								selected="selected"
							@endif
							>{{ $type }}型</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						アンケート項目1: 
							<select class="mt-1 ml-3 py-1 border border-gray-300 bg-white rounded-md sm:text-sm" name="search[enquete1]">
								<option value="">未選択</option>
								@foreach(range(1, 10) as $enquete)
								<option value="{{ $enquete }}"
								@if ($enquete == $condition->enquete1)
									selected="selected"
								@endif
								>{{ $enquete }}</option>
								@endforeach
							</select>
						アンケート項目2: 
							<select class="mt-1 ml-3 py-1 border border-gray-300 bg-white rounded-md sm:text-sm" name="search[enquete2]">
								<option value="">未選択</option>
								@foreach(range(1, 10) as $enquete)
								<option value="{{ $enquete }}"
								@if ($enquete == $condition->enquete2)
									selected="selected"
								@endif
								>{{ $enquete }}</option>
								@endforeach
							</select>

						アンケート項目3: 
							<select class="mt-1 ml-3 py-1 border border-gray-300 bg-white rounded-md sm:text-sm" name="search[enquete3]">
								<option value="">未選択</option>
								@foreach(range(1, 10) as $enquete)
								<option value="{{ $enquete }}"
								@if ($enquete == $condition->enquete3)
									selected="selected"
								@endif
								>{{ $enquete }}</option>
								@endforeach
							</select>
					</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2" style="text-align:right;">
						<input class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit" value="Search" />
					</td>
				</tr>
			</tfoot>
		</table>
	</form>
</section>


@if($results)
<section class="container mx-auto py-4">
<!-- 検索結果 -->
<h2>検索結果</h2>
<table class="table-auto border border-gray-600">
	<thead>
		<tr>
			<th class="border border-gray-600 py-1 px-1">ID</th>
			<th class="border border-gray-600 py-1 px-1">Name</th>
			<th class="border border-gray-600 py-1 px-1">Reading</th>
			<th class="border border-gray-600 py-1 px-1">Address</th>
			<th class="border border-gray-600 py-1 px-1">Birthday</th>
			<th class="border border-gray-600 py-1 px-1">BloodType</th>
			<th class="border border-gray-600 py-1 px-1">Enquete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($results as $customer)
		<tr>
			<td class="border border-gray-600 py-1 px-1">{{ $customer->id }}</td>
			<td class="border border-gray-600 py-1 px-1">{{ $customer->name }}</td>
			<td class="border border-gray-600 py-1 px-1">{{ $customer->reading }}</td>
			<td class="border border-gray-600 py-1 px-1">{{ $customer->address }}</td>
			<td class="border border-gray-600 py-1 px-1">{{ $customer->birthday }}</td>
			<td class="border border-gray-600 py-1 px-1">{{ $customer->blood_type }}</td>
			<td class="border border-gray-600 py-1 px-1">
				<ul>
					<li>アンケート1:{{ $customer->enquete1 }}</li>
					<li>アンケート2:{{ $customer->enquete2 }}</li>
					<li>アンケート3:{{ $customer->enquete3 }}</li>
				</ul>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{ $results->links() }}

</section>
@endif

</body>
</html>