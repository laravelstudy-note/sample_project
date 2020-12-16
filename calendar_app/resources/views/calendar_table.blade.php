<table class="table">
	<thead>
	<tr>
		<th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th><th>日</th>
	</tr>
	</thead>

	<tbody>
		<?php
		
		//月の最初の日
		$firstDay = $time->copy()->firstOfMonth();

		//週の個数を取得
		$week_count = (int)ceil(($time->daysInMonth + $firstDay->dayOfWeek) / 7) + 1;
		
		//週毎にループする
		for($i=0; $i<$week_count; $i++){

			//週の最初の日
			//1日 + (7日 * $i週)の週の開始日
			$firstOfWeek = $firstDay->copy()->addDays(7 * $i)->startOfWeek();

			echo "<tr>";

			//一週間分=7日分ループする
			for($j=0; $j<7; $j++){

				//週の開始日 + j日
				$tmpday = $firstOfWeek->copy()->addDays($j);

				//余白が必要 = 月が違う
				//空白の日を出力
				if($tmpday->month != $time->month){
					echo '<td>&nbsp;</td>';
					continue;
				}

				echo '<td class="day-'.strtolower($tmpday->format("D")).'">';
				echo '<p class="day">' . $tmpday->format('j') . '</p>';

				//ここに該当日の情報を記述する
				if(isset($schedule[$tmpday->format("Ymd")])){
					echo '<p>';
					echo $schedule[$tmpday->format("Ymd")];
					echo '</p>';
				}

				echo '</td>';
			}
			
			echo "</tr>";
		}
		?>

	</tbody>
</table>