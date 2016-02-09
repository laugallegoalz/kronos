<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_identificacion".
 *
 * @property integer $id
 * @property string $nombre_tipo_identificacion
 *
 * @property Persona[] $personas
 */
class TipoIdentificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_identificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_tipo_identificacion'], 'required'],
            [['nombre_tipo_identificacion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre_tipo_identificacion' => Yii::t('app', 'Nombre Tipo Identificacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['tipo_identificacion_id' => 'id']);
    }
}
