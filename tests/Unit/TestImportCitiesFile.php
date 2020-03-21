<?php


namespace Tests\Unit;


use App\City;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class TestImportCitiesFile extends TestCase {

    public function testToSaveCity()
    {
        $city = new City();
        $attributes = array (
            'country_code' => 'DE',
            'zip_code' => '01945',
            'city_name' => 'Grünewald',
            'state' => 'Brandenburg',
            'state_code' => 'BB',
            'empty' => '',
            'unknown ' => '00',
            'province' => 'Landkreis Oberspreewald-Lausitz',
            'province_code' => '12066',
            'lat' => '51.4',
            'lng ' => '14',
            'accuracy' => '4',
        );
        $city->save($attributes);
    }

    public function testToImportFromTabSeparatedFile()
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
                foreach ($cityAttributes as $key => $attribute)
                {
                    $withKey[$attributes[$key]] = $attribute;
                }
                $city = new City();
                $city->fill($withKey);
                $city->save();
            }
        }

        $this->assertTrue(is_array($rows));
    }

    private function getAttributes(array $rows)
    {
        return explode("\t", $rows[0]);
    }

}
