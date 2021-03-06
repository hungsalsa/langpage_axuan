<?php

namespace backend\modules\setting\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\setting\models\SettingWebsite;

/**
 * SettingWebsiteSearch represents the model behind the search form of `backend\modules\setting\models\SettingWebsite`.
 */
class SettingWebsiteSearch extends SettingWebsite
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['title', 'description', 'logo', 'google_analytics', 'email', 'hotline','content_form','title_form','footer'], 'safe'],
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
        $query = SettingWebsite::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'userCreated' => $this->userCreated,
            'userUpdated' => $this->userUpdated,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'footer', $this->footer])
            ->andFilterWhere(['like', 'content_form', $this->content_form])
            ->andFilterWhere(['like', 'title_form', $this->title_form])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'google_analytics', $this->google_analytics])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'hotline', $this->hotline]);

        return $dataProvider;
    }
}
