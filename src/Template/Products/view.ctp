<style>
    img{
        max-width: 100%;
        max-height: 100%;
        display: block; /* remove extra space below image */
    }
</style>
<br>
<?php  if($code===404) echo '<h5 class="text-center">VPN off!</h5>';
    else {?>
<div class="row">
    <div class="col-md-4">
        <?php echo '<img src = "'.$data[0]['images']['image'][3]['value'].'">'; ?>
    </div>
    <div class="col-md-8">
        <h3>
            <?php echo '<a href="./product/'.$data[0]['id'].'">'.$data[0]['title'].'</a>' ?>
        </h3>
        <?php if($data[0]['originalPrice']['value'] !== $data[0]['price']['value']){ ?>
                    <strike><?= h($data[0]['originalPrice']['value']) ?></strike>
                <?php }?>
                <?= h($data[0]['price']['value']) ?><br><br>
                <?= h($data[0]['description']) ?><br><br>
                    <?php if(!$exists) { ?>
                    <?= $this->Form->create('', ['method' => 'post', 'url' => '/cart/add']); ?>
                        <?= $this->Form->input('id', [
                            'style' => 'display:none',
                            'value'=>$data[0]['id'],
                            'label' => false,
                        ]); ?>
                        <?= $this->Form->submit('Add to cart', ['class' => 'btn btn-outline-info']); ?>
                    <?= $this->Form->end(); ?>
                    <br> <?php }?>
                    <?= $this->Form->create('', ['method' => 'post', 'url' => '/order']); ?>
                        <?= $this->Form->input('id', [
                            'style' => 'display:none',
                            'value'=>$data[0]['id'],
                            'label' => false,
                        ]); ?>
                        <?= $this->Form->submit('Order Now', ['class' => 'btn btn-success']); ?>
                    <?= $this->Form->end(); ?>
    </div>
</div>
<h2>Comments</h2>
    <?php if(!$comments) echo 'No comments yet' ?>
    <?php foreach($comments as $comment): ?>
    <strong><?= h($comment['name'])?></strong>: "<?= h($comment['comment']) ?>"<br>
    <?php endforeach ?><br>
    <form method="POST" action="/comment">
        <input name="comment" class="form-control" placeholder="Add a comment...">
        <br>
        <?php echo '<input name="id" value="'.$data[0]['id'].'" style="display:none">' ?>
        <button class="btn btn-primary" type="submit">Comment</button>
    </form>
<?php }?>