<div class="wrapper cart-view">

    <h2>Cart</h2>

    <?php

    /**
     * Alias definieren, weil das productTable Partial intern eine $products Variable verlangt und keine $cartContent
     * Variable.
     */
    $products = $cartContent;

    /**
     * Dem productTable Partial mitteilen, dass es sich aktuell um einen Cart View handelt.
     */
    $isCart = true;

    /**
     * productTable Partial laden.
     */
    require_once __DIR__ . '/partials/productTable.php';

    ?>

</div>