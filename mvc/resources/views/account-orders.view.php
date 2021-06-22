<div class="wrapper">

<h2>Orders</h2>

    
    <?php foreach ($orders as $order): ?>
        
    <div>
        <h3>Order Nr: <?php echo $order->id; ?></h3>
    </div>

    <div class="order-table-container">
        <div>
            <h4>Order Date:</h4>
            <div><?php echo $order->crdate; ?></div>
        </div>
        <div>
            <h4>Status:</h4>
            <div><?php echo $order->status; ?></div>
        </div>
        <div>
            <h4>Delivery Address:</h4>
            <div><?php
                    $address = $order->getDeliveryAddress();

                    echo $address->getAddressHtml();
                    ?>
            </div>
        </div>
        <div>
            <h4>Products:</h4>
            <div>
                <ul>
                    <?php
                    /**
                     * Eine Order kann mehrere Products haben kann, daher mit einer foreach-Schleife alle Produkte durchgehen 
                     */
                    ?>
                    <?php foreach ($order->getProducts() as $product): ?>
                        <li><?php echo "{$product->quantity}x $product->name"; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div>
            <h4>Total:</h4>
            <div><?php echo \App\Models\Product::formatPrice($order->getPrice()); ?></div>
        </div>
        
    </div>
    <hr class="hr-order">
    <?php endforeach; ?>
</div>