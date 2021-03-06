<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property integer $id
 * @property string $barrio
 * @property string $telefono_movil
 * @property integer $cargo_id
 * @property integer $sede_id
 * @property integer $persona_id
 *
 * @property Cargo $cargo
 * @property Persona $persona
 * @property Sede $sede
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo_id', 'sede_id', 'persona_id'], 'required'],
            [['cargo_id', 'sede_id', 'persona_id'], 'integer'],
            [['barrio'], 'string', 'max' => 45],
            [['telefono_movil'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'barrio' => Yii::t('app', 'Barrio'),
            'telefono_movil' => Yii::t('app', 'Telefono Movil'),
            'cargo_id' => Yii::t('app', 'Cargo ID'),
            'sede_id' => Yii::t('app', 'Sede ID'),
            'persona_id' => Yii::t('app', 'Persona ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id' => 'cargo_id']);
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
    public function getSede()
    {
        return $this->hasOne(Sede::className(), ['id' => 'sede_id']);
    }
}
