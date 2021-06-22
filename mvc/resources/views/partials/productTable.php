<?php
    $totalPrice = 0;
    foreach ($products as $product): ?>
<div class="product-table-flexbox">
    <div>
        <div class="product-table-img">
            <?php if (!empty($product->images)): ?>
                <div>
                    <?php foreach ($product->images as $image) {
                        echo '<img class="img-supersonic" src="storage/'. $image . '" alt="' . $product->name . '">';
                        break;  
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="product-table-name"><?php echo $product->name; ?></div>

        <div>Article Number: <?php echo $product->id; ?></div>
        <?php 
        if (isset($product->config)) {
            foreach ($product->config as $label => $value) {

                if($value !== NULL) {
                    echo "<div>" . ucfirst($label) . ": " . ucfirst($value) . "</div>";
                }
            }
        }
         ?>
        <div>Price: <?php echo \App\Models\Product::formatPrice($product->price); ?></div>
    </div>

    <div class="product-table-quantity-subtotal">
        <div class="product-table-quantity">
            <?php if (isset($isCart) && $isCart === true): ?>
                <form action="cart/update/<?php echo $product->id; ?>" method="post">
                    <div class="input-group">
                        <input class="cart-input-quantity form-control" type="number" name="quantity" value="<?php echo $product->quantity; ?>" min="1">
                        <div class="cart-action-btn">
                            <a class="btn cart-action-link" href="cart/sub/<?php echo $product->id; ?>">
                                <svg class="cart-action cart-action-remove" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><path d="M26 0C11.664 0 0 11.663 0 26s11.664 26 26 26 26-11.663 26-26S40.336 0 26 0zm12.5 28h-25a2 2 0 0 1 0-4h25a2 2 0 0 1 0 4z"/></svg>
                            </a>
                            <a class="btn cart-action-link" href="cart/add/<?php echo $product->id; ?>">
                                <svg class="cart-action cart-action-add" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><style>.st0{fill:#fff}</style><path d="M26 0C11.7 0 0 11.7 0 26s11.7 26 26 26 26-11.7 26-26S40.3 0 26 0z"/><path class="st0" d="M40.5 26c0 1.1-.9 2-2 2h-25c-1.1 0-2-.9-2-2s.9-2 2-2h25c1.1 0 2 .9 2 2z"/><path class="st0" d="M26 40.5c-1.1 0-2-.9-2-2v-25c0-1.1.9-2 2-2s2 .9 2 2v25c0 1.1-.9 2-2 2z"/></svg>
                            </a>
                            <a class="btn cart-action-link" href="cart/remove/<?php echo $product->id; ?>">
                                <svg class="cart-action cart-action-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 477.867 477.867"><path d="M443.733 68.267H324.267V51.2c0-28.277-22.923-51.2-51.2-51.2H204.8c-28.277 0-51.2 22.923-51.2 51.2v17.067H34.133c-9.426 0-17.067 7.641-17.067 17.067S24.708 102.4 34.133 102.4h18.551l32.649 359.953c.805 8.814 8.216 15.55 17.067 15.514h273.067c8.851.037 16.261-6.699 17.067-15.514L425.182 102.4h18.552c9.426 0 17.067-7.641 17.067-17.067s-7.642-17.066-17.068-17.066zm-256-17.067c0-9.426 7.641-17.067 17.067-17.067h68.267c9.426 0 17.067 7.641 17.067 17.067v17.067h-102.4V51.2zm-15.769 358.394l-.086.006h-1.212c-8.972.023-16.43-6.906-17.067-15.855l-17.067-238.933c-.669-9.426 6.429-17.609 15.855-18.278 9.426-.669 17.609 6.429 18.278 15.855l17.067 238.933c.693 9.4-6.367 17.581-15.768 18.272zM256 392.533c0 9.426-7.641 17.067-17.067 17.067s-17.067-7.641-17.067-17.067V153.6c0-9.426 7.641-17.067 17.067-17.067S256 144.174 256 153.6v238.933zm85.333-237.721l-17.067 238.933c-.637 8.949-8.095 15.878-17.067 15.855h-1.229c-9.403-.653-16.496-8.805-15.843-18.208l.005-.07L307.2 152.388c.669-9.426 8.853-16.524 18.278-15.855 9.426.67 16.525 8.853 15.855 18.279z"/></svg>
                            </a>
                        </div>
                        
                            <button class="btn-cart-save" type="submit">Save</button>
                        
                    </div>
                </form>
            <?php else: ?>
                <?php echo $product->quantity;?>
            <?php endif; ?>
        
        </div>
        <?php
        $subTotal = $product->price * $product->quantity;
        $totalPrice = $totalPrice + $subTotal;
        ?>
        <div class="product-table-subtotal">Subtotal: <?php echo \App\Models\Product::formatPrice($subTotal); ?></div>
    </div>
</div>
<hr class="product-table-hr">
<?php endforeach; ?>


<div class="product-table-total">Total: <?php echo \App\Models\Product::formatPrice($totalPrice); ?></div>

<?php if (isset($isCart) && $isCart === true): ?>
    <div class="product-table-btn-checkout-container"> 
        <div class="btn product-table-btn-checkout">
            <a href="checkout">Checkout</a>
        </div>   
    </div>
<?php endif; ?>














