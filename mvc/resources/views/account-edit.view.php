<div class="wrapper">
    <h2>Account</h2>

    <h3>Account Details</h3>
    <?php

    $flashMessage = \Core\Session::get('flash', null, true);

    if ($flashMessage !== null) {
        echo "<div class=\"alert alert-success\">$flashMessage</div>";
    }
    ?>

    <form class="account-form" action="account/do-edit" method="post">
        <div class="form-group">
            <label for="firstname">Vorname</label>
            <input id="firstname" name="firstname" class="form-control" placeholder="Vorname" type="text" value="<?php echo $user->firstname; ?>">
        </div>
        <div class="form-group">
            <label for="lastname">Nachname</label>
            <input id="lastname" name="lastname" class="form-control" placeholder="Nachname" type="text" value="<?php echo $user->lastname; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" class="form-control" placeholder="Email" type="email" value="<?php echo $user->email; ?>">
        </div> 

        
        <div class="form-group">
            <?php foreach ($addresses as $address): ?>
            <label for="address[<?php echo $address->id; ?>]">Address</label>
            
            <input id="address[<?php echo $address->id; ?>]" name="address[<?php echo $address->id; ?>]" class="form-control" placeholder="Address" type="text" value="<?php echo $address->getAddressHtml(); ?>">
            <?php endforeach; ?>
        </div> 
    
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" class="form-control" placeholder="******" type="password" name="password">
        </div> 
        <div class="form-group">
            <label for="password2">Passwort wiederholen</label>
            <input id="password2" class="form-control" placeholder="******" type="password" name="password2">
        </div> 
        <div class="form-group btn-account-save">
            <button type="submit" class="btn">Save</button>
        </div> 
    </form>


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