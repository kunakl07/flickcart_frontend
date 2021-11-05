<script type="text/javascript">
    window.history.forward(); 
    function noBack() { 
        window.history.forward(); 
    } 
</script>
<div class="row">
    <?php if($data===null) echo '<h2>Order already placed</h2>'; else{ ?>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h2 class="text-center">Checkout</h2>
            <?php 
                $total=0.0;
                for($i=0; $i<count($data); $i++): 
                    $total += $data[$i]['price']['integral'];
            ?>
                <div class="row">
                    <div class="col-md-1">
                        <?php echo '<img src = "'.$data[$i]['images']['image'][0]['value'].'">'; ?>
                    </div>
                    <div class="col-md-10">
                        <h6>
                            <?php echo '<a href="./product/'.$data[$i]['id'].'">'.$data[$i]['title'].'</a>' ?>
                        </h6>
                        <?= h($data[$i]['price']['value']) ?><br><br>
                    </div>
                </div>
            <?php endfor; ?>
            <strong>Delivery Address</strong>: <?= h($address) ?><br>
            <strong>Delivery Date</strong>:
            <?php 
                $date = strtotime("+7 day");
                echo date('d M, Y', $date); 
            ?>
            <div class="text-center">
                
                <h3>Total value: $<?= h($total/100) ?></h3>
                <?= $this->Form->create('', ['method' => 'post', 'url' => '/orders/placed' ]); ?>
                    <?= $this->Form->submit('Place order', ['class' => 'btn btn-success']); ?>
                <?= $this->Form->end(); ?>
            </div>
        </div> 
    <?php }?>
</div>