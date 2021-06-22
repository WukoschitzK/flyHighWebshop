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
                <a href="checkout/address">Address</a>
                </li>
                <li>/</li>
                <li>Summary</li>
            </ol>
    </div>

    <h2>Address</h2>

    <?php foreach ($errors as $error): ?>
        <p class="text-danger"><?php echo $error; ?></p>
    <?php endforeach; ?>

    <div>
        <div class="chose-payment">
            <h3>Choose Address</h3>
            <form action="checkout/handle-address" method="post">
                <div class="form-group">
                    <label for="address_id" class="sr-only">Choose address</label>
                    <select id="address_id" name="address_id" class="form-control">
                        <option value="_default" selected hidden>Choose ...</option>
                        <?php foreach ($addresses as $address): ?>
                            <option value="<?php echo $address->id; ?>"><?php echo $address->address; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="btn-choose">
                    <button class="btn btn-primary">Choose</button>
                </div>
            </form>
        </div>

        <div class="add-payment">
            <h3>Create Address</h3>
            <form action="checkout/handle-address" method="post">
                <div class="form-group">
                    <label for="address">Address <span class="required">*</span></label>
                    <textarea name="address" id="address" rows="5" class="form-control"></textarea>
                </div>

                <div class="btn-continue-container">
                    <div class="btn-continue">
                        <button class="btn btn-primary">Continue</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>