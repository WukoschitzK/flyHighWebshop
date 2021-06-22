<div class="wrapper">

    <div class="flexcontainer-product-details">
        <?php if (!empty($product->images)): ?>
            <div class="flexcontainer-product-details-img">
                <?php foreach ($product->images as $image): ?>
                    <img class="img-supersonic" src="storage/<?php echo $image; ?>" alt="<?php echo $product->name; ?>">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="flexcontainer-product-details-text">
            <h1 class="h1-product-name"><?php echo $product->name; ?></h1>
            <div class="product-price"><?php printf('%0.2f ,-', $product->price); ?></div>

            <div class="btn btn-add-cart">
                <a href="cart/add/<?php echo $product->id; ?>">Add to Cart</a>
            </div>
        </div>
    </div>

</div>

<svg class="stroke-product-view stroke-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 821 12.2"><path fill="#0067d1" d="M0 2.6h821v9.6H0z"/><path fill="#ffe886" d="M0 0h816.9v8.3H0z"/></svg>

<div class="wrapper">

    <div class="product-details-description">
        <h2>Description</h2>
        <p class="product-details-description-text"><?php echo $product->description; ?></p>
    </div>

</div>


