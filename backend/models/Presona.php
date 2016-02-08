<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "presona".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $identificacion
 * @property string $direccion
 * @property string $telefono
 * @property integer $municipio_id
 * @property integer $tipo_identificacion_id
 *
 * @property Empleado[] $empleados
 * @property Municipio $municipio
 * @property TipoIdentificacion $tipoIdentificacion
 */
class Presona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['municipio_id', 'tipo_identificacion_id'], 'required'],
            [['municipio_id', 'tipo_identificacion_id'], 'integer'],
            [['nombre', 'apellido', 'direccion'], 'string', 'max' => 60],
            [['identificacion'], 'string', 'max' => 20],
            [['telefono'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'identificacion' => Yii::t('app', 'Identificacion'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'municipio_id' => Yii::t('app', 'Municipio ID'),
            'tipo_identificacion_id' => Yii::t('app', 'Tipo Identificacion ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['presona_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoIdentificacion()
    {
        return $this->hasOne(TipoIdentificacion::className(), ['id' => 'tipo_identificacion_id']);
    }
}
