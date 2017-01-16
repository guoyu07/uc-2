<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seminars;

/**
 * SeminarsSearch represents the model behind the search form about `app\models\Seminars`.
 */
class SeminarsSearch extends Seminars
{
    /*
     *
SELECT
s.*, t.name as type,
(select date(d.date) from uc.dates d where s.id = d.seminar_id AND date(d.date) >= date('2016-12-22') order by d.date limit 1) as closerdate,
(select GROUP_CONCAT(date(d.date)) from uc.dates d where s.id = d.seminar_id order by d.date) as dates
FROM uc.seminars s
inner join uc.dates_type t on s.dates_type_id = t.id
having closerdate >= date('2016-12-22')
order by closerdate
     * */


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'onlyMonth', 'dates_type_id'], 'integer'],
            [['name', 'start', 'end', 'created_at', 'updated_at', 'speakers', 'description', 'subscription', 'file'], 'safe'],
            [['price'], 'number'],
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
        $query = Seminars::find();

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
            'start' => $this->start,
            'onlyMonth' => $this->onlyMonth,
            'end' => $this->end,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'dates_type_id' => $this->dates_type_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'speakers', $this->speakers])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'subscription', $this->subscription])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
