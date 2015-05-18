<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Prodaja;

/**
 * ProdajaSearch represents the model behind the search form about `common\models\Prodaja`.
 */
class ProdajaSearch extends Prodaja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pacient_id', 'company_id', 'date', 'user_id'], 'integer'],
            [['diopter', 'glasses', 'frame', 'napomena'], 'safe'],
            [['glasses_price', 'frame_price', 'total_price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Prodaja::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'pacient_id' => $this->pacient_id,
            'company_id' => $this->company_id,
            'date' => $this->date,
            'user_id' => $this->user_id,
            'glasses_price' => $this->glasses_price,
            'frame_price' => $this->frame_price,
            'total_price' => $this->total_price,
        ]);

        $query->andFilterWhere(['like', 'diopter', $this->diopter])
            ->andFilterWhere(['like', 'glasses', $this->glasses])
            ->andFilterWhere(['like', 'frame', $this->frame])
            ->andFilterWhere(['like', 'napomena', $this->napomena]);

        return $dataProvider;
    }
}
