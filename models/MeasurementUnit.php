<?php

namespace robote13\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%measurement_unit}}".
 *
 * @property int $id
 * @property string $title
 *
 * @property Product[] $catalogProducts
 */
class MeasurementUnit extends \yii\db\ActiveRecord
{
    use \robote13\yii2components\traits\DropdownItemsTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%measurement_unit}}';
    }

    public function init()
    {
        $this->attachInvalidate();
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('robote13/catalog', 'ID'),
            'title' => Yii::t('robote13/catalog', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProducts()
    {
        return $this->hasMany(Product::className(), ['measurement_unit_id' => 'id']);
    }
}
