<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PlanillaImportacion;

/**
 * PlanillasImportacionSearch represents the model behind the search form of `common\models\PlanillaImportacion`.
 */
class PlanillasImportacionSearch extends PlanillaImportacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'numero_interno', 'codigo_barras'], 'integer'],
            [['linea', 'rubro', 'marca', 'descripcion', 'unidad_medida', 'precio_costo_neto', 'precio_venta_neto', 'porcentaje_iva', 'moneda', 'stock_de_seguridad', 'punto_de_pedido', 'stock_maximo', 'ubicacion', 'imagen', 'impuesto_interno', 'numero_origen', 'descripcion_origen', 'cuenta_contable_ventas', 'cuenta_contable_compras', 'cuenta_contable_acopio', 'precio_costo_lista_neto', 'primer_descuento', 'segundo_descuento', 'tercer_descuento', 'cuarto_descuento', 'precio_neto_lista_1', 'precio_neto_lista_2', 'precio_neto_lista_3', 'numero_reposicion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PlanillaImportacion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'numero_interno' => $this->numero_interno,
            'codigo_barras' => $this->codigo_barras,
        ]);

        $query->andFilterWhere(['like', 'linea', $this->linea])
            ->andFilterWhere(['like', 'rubro', $this->rubro])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'unidad_medida', $this->unidad_medida])
            ->andFilterWhere(['like', 'precio_costo_neto', $this->precio_costo_neto])
            ->andFilterWhere(['like', 'precio_venta_neto', $this->precio_venta_neto])
            ->andFilterWhere(['like', 'porcentaje_iva', $this->porcentaje_iva])
            ->andFilterWhere(['like', 'moneda', $this->moneda])
            ->andFilterWhere(['like', 'stock_de_seguridad', $this->stock_de_seguridad])
            ->andFilterWhere(['like', 'punto_de_pedido', $this->punto_de_pedido])
            ->andFilterWhere(['like', 'stock_maximo', $this->stock_maximo])
            ->andFilterWhere(['like', 'ubicacion', $this->ubicacion])
            ->andFilterWhere(['like', 'imagen', $this->imagen])
            ->andFilterWhere(['like', 'impuesto_interno', $this->impuesto_interno])
            ->andFilterWhere(['like', 'numero_origen', $this->numero_origen])
            ->andFilterWhere(['like', 'descripcion_origen', $this->descripcion_origen])
            ->andFilterWhere(['like', 'cuenta_contable_ventas', $this->cuenta_contable_ventas])
            ->andFilterWhere(['like', 'cuenta_contable_compras', $this->cuenta_contable_compras])
            ->andFilterWhere(['like', 'cuenta_contable_acopio', $this->cuenta_contable_acopio])
            ->andFilterWhere(['like', 'precio_costo_lista_neto', $this->precio_costo_lista_neto])
            ->andFilterWhere(['like', 'primer_descuento', $this->primer_descuento])
            ->andFilterWhere(['like', 'segundo_descuento', $this->segundo_descuento])
            ->andFilterWhere(['like', 'tercer_descuento', $this->tercer_descuento])
            ->andFilterWhere(['like', 'cuarto_descuento', $this->cuarto_descuento])
            ->andFilterWhere(['like', 'precio_neto_lista_1', $this->precio_neto_lista_1])
            ->andFilterWhere(['like', 'precio_neto_lista_2', $this->precio_neto_lista_2])
            ->andFilterWhere(['like', 'precio_neto_lista_3', $this->precio_neto_lista_3])
            ->andFilterWhere(['like', 'numero_reposicion', $this->numero_reposicion]);

        return $dataProvider;
    }
}
