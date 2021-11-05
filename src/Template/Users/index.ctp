<div class="row">
    <div id="carousel" class="carousel slide carousel-dark carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner" style="background-color:skyblue;">
            <div class="carousel-item active text-center">
                <a target="_blank" href="./product/13697027110"><img src="https://d3-pub.bizrate.com/image/obj/13697027110;sq=500" style="min-width:55%"></a>
            </div>
            <div class="carousel-item text-center">
                <a target="_blank" href="./product/12537082046"><img src="https://d3-pub.bizrate.com/image/obj/12537082046;sq=500" style="min-width:55%"></a>
            </div>
            <div class="carousel-item text-center">
                <a target="_blank" href="./product/12827279670"><img src="https://d3-pub.bizrate.com/image/obj/12827279670;sq=500" style="min-width:55%"></a>
            </div>
        </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel"  data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="row">
    <?php foreach($products as $key => $product): ?>
    <div class="col-md-4 mb-4">
    <h2 class="text-center"><?= h($key) ?></h2><br>
        <?php foreach($product as $data): ?>
            <?= $this->element('productcard',["data" => $data]) ?>
        <?php endforeach ?> 
    </div>
    <?php endforeach; ?>
</div>