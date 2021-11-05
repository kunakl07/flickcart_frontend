<a target="_blank" href=<?=h("./product/".$data['id'])?> >
    <div class="card"> 
        <img class="card-img-top" src=<?=h($data['images']['image'][3]['value'])?>>
            <div class="card-body" target="_blank" href=<?=h("./product/".$data['id'])?>> 
                <h5 class="card-title">
                    <?php echo '<a href="./product/'.$data['id'].'" class="text-decoration-none" title="'.$data['title'].'">'?>
                    <?= h(mb_strimwidth($data['title'], 0, 50, "...")) ?>
                    </a>
                </h5> 
                
                <p class="card-text"> 
                <?php if($data['originalPrice']['value'] !== $data['price']['value']){ ?>
                    <strike><?= h($data['originalPrice']['value']) ?></strike>
                <?php }?>
                <?= h($data['price']['value']) ?>
                </p> 
            </div> 
    </div>
</a><br>