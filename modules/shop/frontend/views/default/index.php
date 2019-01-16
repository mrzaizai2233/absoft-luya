<?php
use luya\admin\image\Item;
use app\modules\shop\frontend\assets\Main;
Main::register($this)
?>

<ul class="products-grid columns4">
    <?php foreach ($products as $product) {?>
        <li>
            <div class="product">
                <figure class="product-image-area">
                    <a href="demo-shop-1-product-details.html" title="Product Name" class="product-image">
                        <img src="<?= Item::create(['file_id'=>$product->getImage()])->getFile() ?>" alt="Product Name">
                        <img src="<?= Item::create(['file_id'=>$product->getImage()])->getFile() ?>" alt="Product Name" class="product-hover-image">
                    </a>

                    <a href="#" class="product-quickview">
                        <i class="fa fa-share-square-o"></i>
                        <span>Quick View</span>
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
                        <a href="#" class="addtowishlist" title="Add to Wishlist">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="Add to Cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Add to Cart</span>
                        </a>
                        <a href="#" class="comparelink" title="Add to Compare">
                            <i class="glyphicon glyphicon-signal"></i>
                        </a>
                    </div>
                </div>
            </div>
        </li>
    <?php } ?>
</ul>
