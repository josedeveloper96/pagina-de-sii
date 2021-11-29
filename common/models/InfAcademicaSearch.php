<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InfAcademica;

/**
 * InfAcademicaSearch represents the model behind the search form of `common\models\InfAcademica`.
 */
class InfAcademicaSearch extends InfAcademica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['infac_id', 'infac_escuela_id', 'infac_tipo'], 'integer'],
            [['infac_disiplina', 'infac_promedio', 'infac_registro', 'infac_fechini', 'infac_fechfin', 'infac_no_de_control'], 'safe'],
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
        $query = InfAcademica::find();

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
            'infac_id' => $this->infac_id,
            'infac_escuela_id' => $this->infac_escuela_id,
            'infac_tipo' => $this->infac_tipo,
            'infac_fechini' => $this->infac_fechini,
            'infac_fechfin' => $this->infac_fechfin,
        ]);

        $query->andFilterWhere(['like', 'infac_disiplina', $this->infac_disiplina])
            ->andFilterWhere(['like', 'infac_promedio', $this->infac_promedio])
            ->andFilterWhere(['like', 'infac_registro', $this->infac_registro])
            ->andFilterWhere(['like', 'infac_no_de_control', Yii::$app->session['usuario']]);

        return $dataProvider;
    }
}
