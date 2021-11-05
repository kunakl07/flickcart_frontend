<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h2 class="text-center">Order Now</h2>
        <?php 
            $total=0.0;
            for($i=0; $i<count($data); $i++): 
                $total += $data[$i]['price']['integral'];
        ?>
            <div class="row">
                <div class="col-md-2">
                    <?php echo '<img src = "'.$data[$i]['images']['image'][1]['value'].'">'; ?>
                </div>
                <div class="col-md-10">
                    <h5>
                        <?php echo '<a class="text-decoration-none" href="./product/'.$data[$i]['id'].'">'.$data[$i]['title'].'</a>' ?>
                    </h5>
                    <?= h($data[$i]['price']['value']) ?><br><br>
                </div>
            </div>
        <?php endfor; ?>
        <div class="text-center">
            <h3>Total value: $<?= h($total/100) ?></h3>
            <?= $this->Form->create('', ['method' => 'get', 'url' => '/addresses' ]); ?>
                <?= $this->Form->submit('Select Address', ['class' => 'btn btn-success']); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>