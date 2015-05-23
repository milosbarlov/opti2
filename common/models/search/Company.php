<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Company as CompanyModel;

/**
 * Company represents the model behind the search form about `common\models\Company`.
 */
class Company extends CompanyModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pdv'], 'integer'],
            [['tin', 'name','city_id', 'address', 'cin'], 'safe'],
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
        $query = CompanyModel::find();

        $query->joinWith('userCompanies',true,'INNER JOIN')->where(['user_id'=>Yii::$app->user->identity->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('city');

        $query->andFilterWhere([
            'id' => $this->id,
           // 'city_id' => $this->city_id,
            'pdv' => $this->pdv,
        ]);

        $query->andFilterWhere(['like', 'tin', $this->tin])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'cin', $this->cin])
            ->andFilterWhere(['like', 'city.name', $this->city_id]);

        return $dataProvider;
    }
}
