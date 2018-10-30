<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WeatherCities */

$this->title = 'Create Weather Cities';
$this->params['breadcrumbs'][] = ['label' => 'Weather Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weather-cities-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
