<h2>商品購入</h2>

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<ul>
	<li>商品名:贈答用紅まどんな（秀）3KG</li>
	<li>価格：5,000円</li>
</ul>

<form method="post" class="text-center mt-xxl">
  @csrf
  <script
    src="https://checkout.pay.jp/"
    class="payjp-button"
    data-key="{{ $payjp_public }}"
    data-text="予約実行"
    data-submit-text="カードを登録"
  ></script>
</form>

<p>※ PAYJPを利用したカードの入力画面が表示されます。</p>

<style type="text/css">
.btn-buy{ 
	padding:10px;
	background-color:orange;
	color:white;
	font-weight:bold;
}

#payjp_checkout_box input[type=button] {
	width: 300px;
	margin: 0 auto;
}
</style>