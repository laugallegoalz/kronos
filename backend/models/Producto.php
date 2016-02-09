<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id
 * @property string $codigo_producto
 * @property string $nombre
 * @property integer $cantidad
 * @property string $descripcion
 * @property integer $categoria_producto_id
 *
 * @property ControlExistenciaProducto[] $controlExistenciaProductos
 * @property CategoriaProducto $categoriaProducto
 * @property ProductoCatalogo[] $productoCatalogos
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad', 'categoria_producto_id'], 'integer'],
            [['categoria_producto_id'], 'required'],
            [['codigo_producto'], 'string', 'max' => 10],
            [['nombre'], 'string', 'max' => 50],
            [['descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'codigo_producto' => Yii::t('app', 'Codigo Producto'),
            'nombre' => Yii::t('app', 'Nombre'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'categoria_producto_id' => Yii::t('app', 'Categoria Producto ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControlExistenciaProductos()
    {
        return $this->hasMany(ControlExistenciaProducto::className(), ['producto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaProducto()
    {
        return $this->hasOne(CategoriaProducto::className(), ['id' => 'categoria_producto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoCatalogos()
    {
        return $this->hasMany(ProductoCatalogo::className(), ['producto_id' => 'id']);
    }
}
