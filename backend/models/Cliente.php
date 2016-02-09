<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $correo_electronico
 * @property integer $presona_id
 *
 * @property Presona $presona
 * @property VentaAsistida[] $ventaAsistidas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presona_id'], 'required'],
            [['presona_id'], 'integer'],
            [['correo_electronico'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'correo_electronico' => Yii::t('app', 'Correo Electronico'),
            'presona_id' => Yii::t('app', 'Presona ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresona()
    {
        return $this->hasOne(Presona::className(), ['id' => 'presona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaAsistidas()
    {
        return $this->hasMany(VentaAsistida::className(), ['cliente_id' => 'id']);
    }
}
