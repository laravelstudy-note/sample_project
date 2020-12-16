<footer style="padding:50px; margin-top:50px; border-top: solid 2px #eee;">
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
	{{ $text ?? '' }}

	<p>
	利用もとから属性やコンテンツを貰う場合は$slotを使う
	{{ $slot }}
	</p>
</footer>