<?php

use app\models\Personal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PersonalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Personals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_personal',
            [
                'label' => 'Name',
                'headerOptions' => ['style'=>'width:200px', 'class'=>'text-center'],
                'value' => function ($model) {
                    // echo '<pre>';
                    // print_r($model);
                    // die;
                    return $model->nama_lengkap;
                }
            ],
            'nama_panggilan',
            'jenis_kelamin',
            'tempat_lahir',
            [
                'label' => 'tanggal_lahir',
                'value' => function ($model) {
                    // echo '<pre>';
                    // print_r($model);
                    // die;
                    return date("d-m-Y", strtotime($model->tanggal_lahir));
                }
            ],
            //'status_perkawinan',
            //'agama',
            //'pendidikan',
            //'alamat',
            //'no_ktp',
            //'no_hp',
            //'email:email',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Personal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_personal' => $model->id_personal]);
                 }
            ],
        ],
    ]); ?>

<!-- 
// Cetak isi dari $dataProvider
// echo '<pre>';
// print_r($dataProvider->models);
// die;
// echo '</pre>';
//
 -->

    <?php Pjax::end(); ?>

</div>
