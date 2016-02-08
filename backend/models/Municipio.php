<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property integer $id
 * @property string $nombre_municipio
 * @property string $departamento_id
 *
 * @property Departamento $departamento
 * @property Presona[] $presonas
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departamento_id'], 'required'],
            [['departamento_id'], 'integer'],
            [['nombre_municipio'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre_municipio' => Yii::t('app', 'Nombre Municipio'),
            'departamento_id' => Yii::t('app', 'Departamento ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['id' => 'departamento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresonas()
    {
        return $this->hasMany(Presona::className(), ['municipio_id' => 'id']);
    }
}
