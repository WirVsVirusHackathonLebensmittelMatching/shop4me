<?php

use App\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use  Illuminate\Support\Facades\Schema;


class CitySeeder extends Seeder {

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        City::truncate();
        $this->importFromTabSeparatedFile();
        Schema::enableForeignKeyConstraints();
    }

    private function importFromTabSeparatedFile()
    {
        $content = File::get(storage_path('app/cities/DE.txt'));
        $rows = explode("\n", $content);
        $attributes = $this->getAttributes($rows);
        foreach ($rows as $rowKey => $row)
        {
            if ($rowKey > 0)
            {
                $cityAttributes = explode("\t", $row);
                $withKey = [];
                $city = new City();
                foreach ($cityAttributes as $key => $attribute)
                {
                    if (in_array($attributes[$key], $city->getFillable()))
                    {
                        $withKey[$attributes[$key]] = $attribute;
                    }
                }

                $city->fill($withKey);
                $city->save();
            }
        }
    }

    private function getAttributes(array $rows)
    {
        return explode("\t", $rows[0]);
    }

}
