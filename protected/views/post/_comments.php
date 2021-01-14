<?php foreach($comments as $comment): ?>
<div class="comment" id="c<?php echo $comment->comn_id;?>">

    <?php echo CHtml::link("#{$comment->comn_id}", $comment->getUrl($post), array(
        'class'=>'cid',
        'title'=>'Link para o comentario',
    )); ?>

    <div class="author">
        <?php echo $comment->authorLink; ?> comentou:
    </div>

    <div class="content">
        <?php echo nl2br(CHtml::encode($comment->comn_content)); ?>
    </div>

    <div class="time">
        <?php echo date('F j, Y h:i a', $comment->comn_date); ?>
    </div>
</div>
<?php endforeach; ?>