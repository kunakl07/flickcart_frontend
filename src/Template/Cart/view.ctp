<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h1 class="text-center">Cart</h1>
        <?php 
            if(count($cart)===0) {echo '<h4 class="text-center">No items added to cart, please continue <a class="text-decoration-none" href="./">shopping</a></h4>'; }
            else{
                for($i=0; $i<count($cart); $i++): ?>
                    <div class="row">
                        <div class="col-md-2">
                            <?php 
                                echo '<img src = "'.$cart[$i]['images']['image'][1]['value'].'">'; 
                            ?>
                        </div>
                        <div class="col-md-10">
                            <h5>
                                <?php 
                                    echo '<a href="./product/'.$cart[$i]['id'].'">'.$cart[$i]['title'].'</a>' 
                                ?>
                            </h5>
                            <?= h($cart[$i]['price']['value']) ?>
                            <?= $this->Form->create('', ['method' => 'post', 'url' => "/cart/delete/".$cart[$i]['id'] ]); ?>
                                <?= $this->Form->submit('Delete', [
                                    'class' => 'btn btn-danger',
                                    'onclick' => 'if (confirm("Remove \''.$cart[$i]['title'].'\' from cart?")) { document.post_6$i3367dea0fff865040255.submit(); } event.returnValue = false; return false;'
                                ]); ?>
                            <?= $this->Form->end(); ?>
                        </div>
                    </div><br>
                <?php endfor;?>
                <div class="text-center">
                    <?= $this->Form->create('', ['method' => 'get', 'url' => '/order' ]); ?>
                        <?= $this->Form->submit('Order Now', ['class' => 'button btn btn-primary']); ?>
                    <?= $this->Form->end(); ?>
                </div>
            <?php }?>
    </div>
</div>