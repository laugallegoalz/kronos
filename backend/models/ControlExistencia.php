<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "control_existencia".
 *
 * @property integer $id
 * @property string $observaciones
 * @property string $fecha
 * @property integer $user_id
 *
 * @property User $user
 * @property ControlExistenciaProducto[] $controlExistenciaProductos
 */
class ControlExistencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'control_existencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'user_id'], 'required'],
            [['fecha'], 'safe'],
            [['user_id'], 'integer'],
            [['observaciones'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'fecha' => Yii::t('app', 'Fecha'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControlExistenciaProductos()
    {
        return $this->hasMany(ControlExistenciaProducto::className(), ['control_existencia_id' => 'id']);
    }
}
