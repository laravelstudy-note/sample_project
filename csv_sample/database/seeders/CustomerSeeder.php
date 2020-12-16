<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//CSVの設置場所
		$csv_path = resource_path('csv/personal_infomation.csv');
		if(!\file_exists($csv_path)){
			die("personal_infomation.csv is missing\n");
		}

		//CSVを読み込む
		$fp = fopen($csv_path, "r");

		$line_count = 0;

		while($data = \fgetcsv($fp)){

			//先頭のデータは除く
			if($line_count < 1){
				$line_count++;
				continue;
			}

			//
			Customer::create([
				"name" => $data[1],
				"reading" => $data[2],
				"reading_alphabet" => $data[3],
				"gender" => $data[4],
				"telephone" => $data[5],
				"mailaddress" => $data[6],
				"zipcode" => $data[7],
				"address" => $data[8] . $data[9] . $data[10] . $data[11] . $data[12],
				"birthday" => $data[13],
				"age" => $data[14],
				"hometown" => $data[15],
				"blood_type" => $data[16],

				//アンケート項目は乱数で生成
				"enquete1" => rand(1, 10),
				"enquete2" => rand(1, 10),
				"enquete3" => rand(1, 10),
			]);



			$line_count++;

		}


		fclose($fp);
    }
}
