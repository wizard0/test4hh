    <?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>You Are ADMIN!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2><a href="<?= \yii\helpers\Url::toRoute('user/index') ?>">User Editor</a></h2>

                <p></p>
            </div>
            <div class="col-lg-4">
                <h2><a href="<?= \yii\helpers\Url::toRoute('weather/index') ?>">Weather Editor</a></h2>

                <p></p>
            </div>
            <div class="col-lg-4">
                <h2>Nothing</h2>

                <p>To be continued...</p>

            </div>
        </div>

    </div>
</div>
