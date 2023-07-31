<?php
namespace Legioner\City;

use
    Bitrix\Main\Type,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\IntegerField,
    Bitrix\Main\ORM\Fields\FloatField,
    Bitrix\Main\ORM\Fields\StringField;

class CityTestTable extends DataManager
{
    public static function getTableName()
    {
        return 'b_city_test';
    }
    public static function getConnectionName()
    {
        return 'default';
    }
    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true
                ]
            ),
            //Название города
            new StringField('CITY_NAME',[
                'required' => true
            ]),
            //Доходы
            new FloatField('CITY_PROFIT',[
                'default' => 0
            ]),
            //Затраты
            new FloatField('CITY_EXPENSES',[
                'default' => 0
            ]),
            //Количество жителей
            new IntegerField('CITY_COUNT',[
                'default' => 0
            ]),
        ];
    }

}