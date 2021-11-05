<div class="row">
    <h3 class="text-center">Results for "<?= h($this->request->query('q'))?>"</h3>
    <?php if($code===404) echo '<h5 class="text-center">VPN off!</h5>';
        if($data['includedResults']===null || $data['includedResults']===0) echo '<h5 class="text-center">No results found!</h5>';
        else{    ?>
            <h5 class="text-center">
            Minimum: <?= h($data['priceSet']['minPrice']['value']) ?> -
            Maximum: <?= h($data['priceSet']['maxPrice']['value']) ?>
            </h5>
            <?php if($data['totalResults']!=$data['includedResults']){ ?>
                <div class="row">
                    <div class="col-md-4">
                        <h3>
                        <?php
                            $start = $this->request->query('start');
                            $q = preg_replace('/\s+/', '+', $this->request->query('q'));
                            if($start!=0) echo '<a class="text-decoration-none" href="./search?q='.$q.'&start='.($start-20).'"><i class="bi bi-caret-left"></i>Previous</a>'; ?>
                        </h3>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h3><?php if($start!=($data['totalResults']-20))
                            echo '<a class="text-decoration-none" href="./search?q='.$q.'&start='.($start+20).'">Next<i class="bi bi-caret-right"></i></a>'; ?>
                        </h3>
                    </div>
                </div><br>
                <?php }?>
            <?php
                $total = $data['includedResults'];
                for($product=0; $product<$total; $product++){ ?>
                    <div class="col-md-3">
                    <?= $this->element('productcard',["data" => $data[$product]]) ?>
                    </div>
        <?php      }
            }
        ?>
        <?php if($data['totalResults']!=$data['includedResults']){ ?>
        <div class="row">
            <div class="col-md-4">
                <h3>
                <?php
                    $start = $this->request->query('start');
                    $q = preg_replace('/\s+/', '+', $this->request->query('q'));
                    if($start!=0) echo '<a class="text-decoration-none" href="./search?q='.$q.'&start='.($start-20).'"><i class="bi bi-caret-left"></i>Previous</a>'; ?>
                </h3>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h3><?php if($start!=($data['totalResults']-20))
                    echo '<a class="text-decoration-none" href="./search?q='.$q.'&start='.($start+20).'">Next<i class="bi bi-caret-right"></i></a>'; ?>
                </h3>
            </div>
        </div><br>
        <?php }?>
</div>
