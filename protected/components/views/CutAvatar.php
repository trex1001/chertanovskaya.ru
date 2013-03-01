<?php
/* @var $this CutAvatar */
/* @var $model Avatar */
?>
<?php echo CHtml::beginForm() ?>

<?php echo CHtml::image($model->urlToImage(),null,array("id"=>"avatar")) ; ?>
<div class="frame"
     style="margin: 0 1em; width: 100px; height: 100px;">
<div id="preview" style="width: 100px; height: 100px; overflow: hidden;">
    <img src="<?=$model->urlToImage()?>" style="width: 100px; height: 100px;" />
</div>
</div>
<?php echo CHtml::hiddenField("cutAvatar"); ?>
<?php echo CHtml::errorSummary($model) ?>
<?php echo CHtml::activeTextField($model,"top",array("id"=>"top"));?>
<?php echo CHtml::activeTextField($model,"left",array("id"=>"left"));?>
<?php echo CHtml::activeTextField($model,"heigth",array("id"=>"heigth"));?>
<?php echo CHtml::activeTextField($model,"width",array("id"=>"width"));?>
<?php echo CHtml::submitButton();?>
<?php echo CHtml::endForm(); ?>
<script>

    $(document).ready(function () {
        function preview(img, selection) {
            if (!selection.width || !selection.height)
                return;
            var scaleX = 100 / selection.width;
            var scaleY = 100 / selection.height;

            $('#preview img').css({
                width: Math.round(scaleX *  <?=$model->image()->width?>),
                height: Math.round(scaleY * <?=$model->image()->height?>),
                marginLeft: -Math.round(scaleX * selection.x1),
                marginTop: -Math.round(scaleY * selection.y1)
            });
            $("#top").val(selection.y1);
            $("#left").val(selection.x1);
            $("#width").val(selection.width);
            $("#heigth").val(selection.height);

        }

        var ias =$('#avatar').imgAreaSelect({aspectRatio: '1:1', x1: <?=$model->left?>, y1: <?=$model->top?>, x2: <?=$model->left+$model->width?>, y2: <?=$model->top+$model->heigth?>,onSelectChange: preview, instance: true });

        preview($('#avatar'), ias.getSelection());





    });
</script>