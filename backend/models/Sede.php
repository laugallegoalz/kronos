<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sede".
 *
 * @property integer $id
 * @property string $nombre_sede
 *
 * @property Empleado[] $empleados
 */
class Sede extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sede';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_sede'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre_sede' => Yii::t('app', 'Nombre Sede'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['sede_id' => 'id']);
    }
}
