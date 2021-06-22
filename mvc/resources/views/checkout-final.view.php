<div class="wrapper checkout-form">

    <div>
        <h3>Checkout</h3>
            <ol class="flexcontainer-checkout-nav">
                <li class="checkout-nav-done">
                    <a href="login">Login</a>
                </li>
                <li>/</li>
                <li class="checkout-nav-done">
                    <a href="checkout">Payment Details</a>
                </li>
                <li>/</li>
                <li class="checkout-nav-done">
                    <a href="checkout/handle-address">Address</a>
                </li>
                <li>/</li>
                <li class="checkout-nav-done-summary">
                    Summary
                </li>
            </ol>
    </div>

    <h2>Checkout</h2>

    <div>
        <div class="payment">
            <h3>Payment Details</h3>
            <p>
                Name: <strong><?php echo $payment->name; ?></strong>
                <br>
                Number: ...<?php echo substr($payment->number, -4); ?>
                <br>
                Expires: <?php echo $payment->expires; ?>
            </p>
        </div>

        <div class="address">
            <h3>Adress Details</h3>
            <p>
                <strong><?php echo "$user->firstname $user->lastname"; ?></strong>
                <br>
                <?php echo $address->getAddressHtml(); ?>
            </p>
        </div> 
    </div>

    <h3>Cart Summary</h3>

    <?php require_once __DIR__ . '/partials/productTable.php'; ?>
    <div class="checkout-finalise-actions">
        <a href="cart" class="link-continue">Continue Shopping</a>

        <div class="btn-place-order-container">
            <div class="btn-place-order">
                <a href="checkout/do-checkout" class="btn btn-primary">Place Order</a>
            </div>
        </div>
    </div>

</div>
