<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "control_existencia_producto".
 *
 * @property integer $id
 * @property integer $control_existencia_id
 * @property integer $producto_id
 *
 * @property ControlExistencia $controlExistencia
 * @property Producto $producto
 */
class ControlExistenciaProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'control_existencia_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['control_existencia_id', 'producto_id'], 'required'],
            [['control_existencia_id', 'producto_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'control_existencia_id' => Yii::t('app', 'Control Existencia ID'),
            'producto_id' => Yii::t('app', 'Producto ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControlExistencia()
    {
        return $this->hasOne(ControlExistencia::className(), ['id' => 'control_existencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }
}
