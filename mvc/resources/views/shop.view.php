<img class="img-objectfit-shop" src="public/img/images/shop/header.jpg" alt="BMX Biker with sky as background">

<div class="wrapper">
    <div class="flexcontainer-products">
        <?php foreach ($products as $product): ?>
            <a class="no-underline" href="products/<?php echo $product->id; ?>">
                <div class="product-card product-card-shop">

                    <?php if (!empty($product->images)): ?>
                        <div class="product-card-img-container">
                            <?php foreach ($product->images as $image): ?>
                                <img class="img-thumbnail" src="storage/<?php echo $image; ?>" alt="<?php echo $product->name; ?>">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <h3>
                        <?php echo $product->name; ?>         
                    </h3>
                    
                    <div>
                        <p class="product-card-price"><?php echo $product->getprice(); ?></p>
                    </div>

                    <div class="btn-more-details">More Details</div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>