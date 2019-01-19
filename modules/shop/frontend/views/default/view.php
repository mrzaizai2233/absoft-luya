<?php
/**
 * Created by PhpStorm.
 * User: Truong Tuan Dat
 * Date: 1/19/2019
 * Time: 11:27 AM
 */

use app\modules\shop\frontend\assets\Main;
use app\modules\shop\frontend\helpers\ImageHelper;
Main::register($this)
?>
<div class="row">
    <div class="col-md-9">
        <div class="product-view">
            <div class="product-essential">
                <div class="row">
                    <div class="product-img-box col-sm-5">
                        <div class="product-img-box-wrapper">
                            <div class="product-img-wrapper">
                                <img id="product-zoom" src="<?= ImageHelper::getProductImage($product) ?>" data-zoom-image="<?= ImageHelper::getProductImage($product) ?>" alt="Product main image">
                            </div>

                            <a href="#" class="product-img-zoom" title="Zoom">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>
                        </div>

                    </div>

                    <div class="product-details-box col-sm-7">
                        <div class="product-nav-container">
                            <div class="product-nav product-nav-prev">
                                <a href="#" title="Previous Product">
                                    <i class="fa fa-chevron-left"></i>
                                </a>

                                <div class="product-nav-dropdown">
                                    <img src="../img/demos/shop/products/product1.jpg" alt="Product">
                                    <h4>Blue Denim Dress</h4>
                                </div>
                            </div>
                            <div class="product-nav product-nav-next">
                                <a href="#" title="Next Product">
                                    <i class="fa fa-chevron-right"></i>
                                </a>

                                <div class="product-nav-dropdown">
                                    <img src="../img/demos/shop/products/product2.jpg" alt="Product">
                                    <h4>Black Woman Shirt</h4>
                                </div>
                            </div>
                        </div>
                        <h1 class="product-name">
                            <?= $product->getName(); ?>
                        </h1>

 <!--                       <div class="product-rating-container">
                            <div class="product-ratings">
                                <div class="ratings-box">
                                    <div class="rating" style="width:60%"></div>
                                </div>
                            </div>
                            <div class="review-link">
                                <a href="#" class="review-link-in" rel="nofollow"> <span class="count">1</span> customer review</a> |
                                <a href="#" class="write-review-link" rel="nofollow">Add a review</a>
                            </div>
                        </div>
-->
                        <div class="product-short-desc">
                            <?= $product->getShortDescription() ?>
                        </div>

                        <div class="product-detail-info">
                            <div class="product-price-box">
<!--                                <span class="old-price">$99.00</span>-->
                                <span class="product-price">$<?= $product->getPrice() ?></span>
                            </div>
                            <p class="availability">
                                <span class="font-weight-semibold"><?= Yii::t('app','Trạng thái:') ?></span>
                                <?= $product->getStatus() == 1? Yii::t('app','Còn hàng') :Yii::t('app','Hết hàng') ?>
                            </p>
<!--                            <p class="email-to-friend"><a href="#">Email to a Friend</a></p>-->
                        </div>

                        <div class="product-actions">
                            <div class="product-detail-qty">
                                <input type="text" value="1" class="vertical-spinner" id="product-vqty">
                            </div>
                            <a href="#" class="addtocart" title="Add to Cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?= Yii::t('app','Thêm vào giỏ') ?></span>
                            </a>

                            <div class="actions-right">
                                <a href="#" class="addtowishlist" title="<?= Yii::t('app','Yêu thích') ?>">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="#" class="comparelink" title="<?= Yii::t('app','So Sánh') ?>">
                                    <i class="glyphicon glyphicon-signal"></i>
                                </a>
                            </div>
                        </div>

                        <div class="product-share-box">
                            <div class="addthis_inline_share_toolbox"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tabs product-tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#product-desc" data-toggle="tab"><?= Yii::t('app','Mô tả') ?></a>
                    </li>
<!--                    <li>-->
<!--                        <a href="#product-add" data-toggle="tab">--><?php //echo Yii::t('app','Thuộc tính') ?><!--</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#product-tags" data-toggle="tab">Tags</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#product-reviews" data-toggle="tab">--><?php //echo Yii::t('app','Đánh giá')?><!--</a>-->
<!--                    </li>-->
                </ul>
                <div class="tab-content">
                    <div id="product-desc" class="tab-pane active">
                        <div class="product-desc-area">
                            <?= $product->getDescription() ?>
                        </div>
                    </div>
                    <div id="product-add" class="tab-pane">
                        <table class="product-table">
                            <tbody>
                            <tr>
                                <td class="table-label">Color</td>
                                <td>Black</td>
                            </tr>
                            <tr>
                                <td class="table-label">Size</td>
                                <td>16mx24mx18m</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="product-tags" class="tab-pane">
                        <div class="product-tags-area">
                            <form action="#">
                                <div class="form-group">
                                    <label>Add Your Tags:</label>
                                    <div class="clearfix">
                                        <input type="text" class="form-control pull-left" required>
                                        <input type="submit" class="btn btn-primary" value="Add Tags">
                                    </div>
                                </div>
                            </form>
                            <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                        </div>
                    </div>
                    <div id="product-reviews" class="tab-pane">
                        <div class="collateral-box">
                            <ul class="list-unstyled">
                                <li>Be the first to review this product</li>
                            </ul>
                        </div>

                        <div class="add-product-review">
                            <h3 class="text-uppercase heading-text-color font-weight-semibold">WRITE YOUR OWN REVIEW</h3>
                            <p>How do you rate this product? *</p>

                            <form action="#">
                                <table class="ratings-table">
                                    <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>1 star</th>
                                        <th>2 stars</th>
                                        <th>3 stars</th>
                                        <th>4 stars</th>
                                        <th>5 stars</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Quality</td>
                                        <td>
                                            <input type="radio" name="ratings[1]" id="Quality_1" value="1" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="ratings[1]" id="Quality_2" value="2" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="ratings[1]" id="Quality_3" value="3" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="ratings[1]" id="Quality_4" value="4" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="ratings[1]" id="Quality_5" value="5" class="radio">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Value</td>
                                        <td>
                                            <input type="radio" name="value[1]" id="Value_1" value="1" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="value[1]" id="Value_2" value="2" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="value[1]" id="Value_3" value="3" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="value[1]" id="Value_4" value="4" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="value[1]" id="Value_5" value="5" class="radio">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>
                                            <input type="radio" name="price[1]" id="Price_1" value="1" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="price[1]" id="Price_2" value="2" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="price[1]" id="Price_3" value="3" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="price[1]" id="Price_4" value="4" class="radio">
                                        </td>
                                        <td>
                                            <input type="radio" name="price[1]" id="Price_5" value="5" class="radio">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="form-group">
                                    <label>Nickname<span class="required">*</span></label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Summary of Your Review<span class="required">*</span></label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="form-group mb-xlg">
                                    <label>Review<span class="required">*</span></label>
                                    <textarea cols="5" rows="6" class="form-control"></textarea>
                                </div>

                                <div class="text-right">
                                    <input type="submit" class="btn btn-primary" value="Submit Review">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     </div>
    <aside class="col-md-3 sidebar product-sidebar">
        <div class="feature-box feature-box-style-3">
            <div class="feature-box-icon">
                <i class="fa fa-truck"></i>
            </div>
            <div class="feature-box-info">
                <h4>GIAO HÀNG HỎA TỐC</h4>
                <p class="mb-none">Giao hàng trong 2 giờ.</p>
            </div>
        </div>

        <div class="feature-box feature-box-style-3">
            <div class="feature-box-icon">
                <i class="fa fa-dollar"></i>
            </div>
            <div class="feature-box-info">
                <h4>HOÀN TIỀN</h4>
                <p class="mb-none">Hoàn tiền 100% nếu không hài lòng.</p>
            </div>
        </div>

        <div class="feature-box feature-box-style-3">
            <div class="feature-box-icon">
                <i class="fa fa-support"></i>
            </div>
            <div class="feature-box-info">
                <h4>HỖ TRỢ TRỰC TUYẾN 24/7</h4>
                <p class="mb-none">Sẵn sàng hỗ trợ trực tuyến 24/7.</p>
            </div>
        </div>

<!--        <hr class="mt-xlg">-->
<!---->
<!--        <div class="owl-carousel owl-theme" data-plugin-options="{'items':1, 'margin': 5}">-->
<!--            <a href="#">-->
<!--                <img class="img-responsive" src="../img/demos/shop/banners/banner1-black.jpg" alt="Banner">-->
<!--            </a>-->
<!--            <a href="#">-->
<!--                <img class="img-responsive" src="../img/demos/shop/banners/banner2-black.jpg" alt="Banner">-->
<!--            </a>-->
<!--        </div>-->

        <hr>
    </aside>
</div>
