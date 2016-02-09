<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $correo_electronico
 * @property integer $persona_id
 *
 * @property Persona $persona
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
            [['persona_id'], 'required'],
            [['persona_id'], 'integer'],
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
            'persona_id' => Yii::t('app', 'Persona ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaAsistidas()
    {
        return $this->hasMany(VentaAsistida::className(), ['cliente_id' => 'id']);
    }
}
