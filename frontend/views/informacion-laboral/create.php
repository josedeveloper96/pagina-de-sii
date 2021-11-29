<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\InformacionLaboral */

$this->title = 'Ingresar Información Laboral';
//$this->params['breadcrumbs'][] = ['label' => 'Información Laboral', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacion-laboral-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(['id' => 'inf_lab_id']) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<?php Pjax::end() ?>
</div>
