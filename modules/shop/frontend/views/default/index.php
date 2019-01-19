<?php
use app\modules\shop\frontend\assets\Main;
use app\modules\shop\frontend\helpers\ImageHelper;
use yii\helpers\Url;
Main::register($this)
/**
 * @var \app\modules\shop\models\CatalogProductEntity[] $products
 */
?>
<ul class="products-grid columns4">
    <?php foreach ($products as $product) {?>
        <li>
            <div class="product">
                <figure class="product-image-area">
                    <a href="<?= Url::toRoute(['/shop/default/view', 'id' => $product->getEntityId()]) ?>" title="Product Name" class="product-image">
                        <img src="<?= ImageHelper::getProductImage($product) ?>" alt="Product Name" class="img-responsive product-image" style="height: 250px">
                        <img src="<?= ImageHelper::getProductImage($product) ?>" alt="Product Name" class="product-hover-image img-responsive" style="height: 250px">
                    </a>

                    <a href="#" class="product-quickview">
                        <i class="fa fa-share-square-o"></i>
                        <span><?= \Yii::t('app','Xem nhanh') ?></span>
                    </a>
                    <div class="product-label"><span class="discount">-10%</span></div>
                    <div class="product-label"><span class="new">New</span></div>
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="demo-shop-1-product-details.html" title="Product Name"><?= $product->getName() ?></a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:60%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        <span class="old-price">$<?= $product->getPrice() ?></span>
                        <span class="product-price">$<?= $product->getPrice() ?></span>
                    </div>

                    <div class="product-actions">
                        <a href="#" class="addtowishlist" title="<?= \Yii::t('app','Yêu thích') ?>">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="<?= \Yii::t('app','Thêm vào giỏ') ?>">
                            <i class="fa fa-shopping-cart"></i>
                            <span><?= \Yii::t('app','Thêm vào giỏ') ?></span>
                        </a>
                        <a href="#" class="comparelink" title="<?= \Yii::t('app','So sánh') ?>">
                            <i class="glyphicon glyphicon-signal"></i>
                        </a>
                    </div>
                </div>
            </div>
        </li>
    <?php } ?>
</ul>
