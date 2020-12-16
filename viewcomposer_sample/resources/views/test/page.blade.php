this is test.page.blade.php

<div>
@include("test.parts.header")
</div>

<div>
<h3>View Composerの利用</h3>

<p>Providerを作成する</p>

<pre>
php artisan make:provider ViewServiceProvider
</pre>

<p>-> app/Providers/ViewServiceProvider.phpが作成される</p>


<p>Providerを登録する</p>

<p>- config/app.php</p>

<pre>
App\Providers\RouteServiceProvider::class,
App\Providers\ViewServiceProvider::class	//ここを追加
</pre>

<p>Composerを作成する</p>

<p>Composerはどこに作っても良い</p>
<p>ヘッダーのパーツを作成するためのHeaderComposerを「app/Http/Composers/HeaderComposer.php」に作成する</p>

<p>Providerを使って、Conmposerを登録する</p>
<pre>
View::composer('test.parts.header', \App\Http\Composers\HeaderComposer::class);
</pre>

<div>

<pre>
例えば、ヘッダーやサイドメニューのような「各画面に表示される共通部品」を作成するために
ViewComposerを利用する。
</pre>

<h3>Componentの利用</h3>

<pre>
$ php artisan make:component FooterComponent

-> resources/views/components/footer-component.blade.php
-> app/View/Components/FooterComponent.php
</pre>

<p>Providerに登録する</p>

<pre>
Blade::component('footer', \App\View\Components\FooterComponent::class);

利用法
Blade::component('コンポーネントID'', クラス名);

呼び出し側はx-コンポーネントIDの形でタグを書く
&lt;x-footer&gt;
本文
&lt/x-footer&gt;
</pre>

<x-footer>
かきくけこ
</x-footer>

@component("components.footer-component")
あいうえお
@endcomponent