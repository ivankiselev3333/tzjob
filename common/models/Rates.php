<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Rates".
 *
 * @property int $id
 * @property string $valute_id
 * @property string $dttm
 * @property int $numcode
 * @property string $charcode
 * @property string $name
 * @property int $nominal
 * @property float $value
 */
class Rates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Rates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dttm'], 'required'],
            [['dttm'], 'safe'],
            [['numcode', 'nominal'], 'integer'],
            [['value'], 'number'],
            [['valute_id'], 'string', 'max' => 8],
            [['charcode'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 32],
            [['dttm', 'charcode'], 'unique', 'targetAttribute' => ['dttm', 'charcode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'valute_id' => Yii::t('app', 'Valute ID'),
            'dttm' => Yii::t('app', 'Dttm'),
            'numcode' => Yii::t('app', 'Numcode'),
            'charcode' => Yii::t('app', 'Charcode'),
            'name' => Yii::t('app', 'Name'),
            'nominal' => Yii::t('app', 'Nominal'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return RatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RatesQuery(get_called_class());
    }
}
