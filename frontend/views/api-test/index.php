<h2>/auth test</h2>
<form name="authTest">
    <input type="hidden" name="authTest" value="1">
    <input type="hidden" name="_csrf-frontend" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="form-group">
        <label for="jsonInput">request data JSON</label>
        <textarea name="authData" id="jsonInput" class="form-control" rows="5">
{
    "login": "",
    "password": ""
}
        </textarea>
    </div>
    <input type="submit" class="btn btn-primary">
</form>

<div>
    <h3>/auth response</h3>
    <p id="authResponse"></p>
</div>

<h2>/weather test</h2>
<form name="weatherTest">
    <input type="hidden" name="weatherTest" value="1">
    <input type="hidden" name="_csrf-frontend" value="<?=Yii::$app->request->getCsrfToken()?>" />
    <div class="form-group">
        <label for="tokenInput">Token</label>
        <input type="text" name="token" id="tokenInput" class="form-control">
    </div>
    <input type="submit" class="btn btn-primary">
</form>

<div>
    <h3>/weather response</h3>
    <p id="weatherResponse"></p>
</div>

<?php
$js = <<<JS
    $('form[name="authTest"]').on('submit', function(){
        var data = $(this).serialize();
        $.ajax({
            url: '/auth',
            type: 'POST',
            data: data,
            success: function(res){
                $("#authResponse").html(res);
                $("#tokenInput").val($.parseJSON(res).token)
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });

    $('form[name="weatherTest"]').on('submit', function(){
        var data = $(this).serialize();
        $.ajax({
            url: '/weather',
            type: 'GET',
            data: data,
            success: function(res){
                $("#weatherResponse").html(res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
JS;
$this->registerJs($js);
