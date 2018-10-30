<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WeatherCities */

$this->title = 'Update Weather Cities: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Weather Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="weather-cities-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
