<?php
namespace Legioner\Test;

use Bitrix\Main\ORM\Fields\ScalarField;
use
    Bitrix\Main\Type,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\IntegerField,
    Bitrix\Main\ORM\Fields\FloatField,
    Bitrix\Main\ORM\Fields\StringField;

class SityTestTable extends DataManager
{
    public static function getTableName()
    {
        return 'b_sity_test';
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
            new StringField('SITY_NAME',[
                'required' => true
            ]),
            //Доходы
            new FloatField('SITY_PROFIT',[
                'default' => 0
            ]),
            //Затраты
            new FloatField('SITY_EXPENSES',[
                'default' => 0
            ]),
            //Количество жителей
            new IntegerField('SITY_COUNT',[
                'default' => 0
            ]),
        ];
    }

}