<br><div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
    <?php if(count($addresses)===0) echo '<h3>No addresses yet, add one to finalize order</h3>';
        else{ ?> 
            <h3 class="text-center">Select from saved addresses</h3>
            <form method="post" action="./addresses/select">
                <div class="form-check">
                    <?php foreach($addresses as $address):
                        echo '<input class="form-check-input" id="'.$address['address_id'].'" type="radio" name="id" value="'.$address['address_id'].'" checked>';
                        echo '<label class="form-check-label" for="'.$address['address_id'].'">';
                    ?>
                        <?= h($address['address']) ?>
                    </label><br>
                    <?php endforeach; ?>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">
                        Select address
                    </button>
                </div>
            </form><br>
        
        <h5 class="text-center">Or</h5>
        <?php } ?>
        <h3 class="text-center">Add another address</h3>
        <div>
            <form method="post" action="./addresses/add">
                <label for="address-box">Enter Address</label>
                <textarea id="address-box" class="form-control" name="address" rows="5"></textarea>
                <br>
                <div class="text-center">
                    <button class="btn btn-primary btn-lg" type="submit">
                        Add address
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>