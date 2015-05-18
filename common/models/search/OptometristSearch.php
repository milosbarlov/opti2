<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Optometrist;

/**
 * OptometristSearch represents the model behind the search form about `common\models\Optometrist`.
 */
class OptometristSearch extends Optometrist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pacient_id', 'predio', 'created_at'], 'integer'],
            [['dodsph', 'dodcyl', 'dodax', 'dossph', 'doscyl', 'dosax', 'dpd', 'dstakla', 'dokvir', 'bodsph', 'bodcyl', 'bodax', 'bossph', 'boscyl', 'bosax', 'bpd', 'bstakla', 'bokvir', 'vod', 'vos', 'note', 'personal_note'], 'safe'],
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
        $query = Optometrist::find();

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
            'predio' => $this->predio,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'dodsph', $this->dodsph])
            ->andFilterWhere(['like', 'dodcyl', $this->dodcyl])
            ->andFilterWhere(['like', 'dodax', $this->dodax])
            ->andFilterWhere(['like', 'dossph', $this->dossph])
            ->andFilterWhere(['like', 'doscyl', $this->doscyl])
            ->andFilterWhere(['like', 'dosax', $this->dosax])
            ->andFilterWhere(['like', 'dpd', $this->dpd])
            ->andFilterWhere(['like', 'dstakla', $this->dstakla])
            ->andFilterWhere(['like', 'dokvir', $this->dokvir])
            ->andFilterWhere(['like', 'bodsph', $this->bodsph])
            ->andFilterWhere(['like', 'bodcyl', $this->bodcyl])
            ->andFilterWhere(['like', 'bodax', $this->bodax])
            ->andFilterWhere(['like', 'bossph', $this->bossph])
            ->andFilterWhere(['like', 'boscyl', $this->boscyl])
            ->andFilterWhere(['like', 'bosax', $this->bosax])
            ->andFilterWhere(['like', 'bpd', $this->bpd])
            ->andFilterWhere(['like', 'bstakla', $this->bstakla])
            ->andFilterWhere(['like', 'bokvir', $this->bokvir])
            ->andFilterWhere(['like', 'vod', $this->vod])
            ->andFilterWhere(['like', 'vos', $this->vos])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'personal_note', $this->personal_note]);

        return $dataProvider;
    }
}
