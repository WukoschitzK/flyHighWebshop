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
                <li>Address</li>
                <li>/</li>
                <li>Summary</li>
            </ol>
    </div>

    <h2>Payment Details</h2>

    <div>
        <div>
            <h3>Choose Payment</h3>

            <?php foreach ($errors as $error): ?>
                <p class="text-danger"><?php echo $error; ?></p>
            <?php endforeach; ?>


            <form action="checkout/handle-payment" method="post">
                <div class="form-group">
                    <label for="payment" class="sr-only">Choose payment</label>
                    <select name="payment" id="payment" class="form-control">
                        <option value="_default" selected hidden>Choose ...</option>
                        <?php foreach ($payments as $payment): ?>
                            <option value="<?php echo $payment->id; ?>"><?php echo $payment->name; ?>: ...<?php echo substr($payment->number, -4); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="btn-choose">
                    <button class="btn btn-primary">Choose</button>
                </div>
            </form>
        </div>

        <div>
            <h3>Create Payment</h3>
            <form action="checkout/handle-payment" method="post">
                <div class="form-group">
                    <label for="name">Name <span class="required">*</span></label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="number">Card Number <span class="required">*</span></label>
                    <input type="text" id="number" name="number" class="form-control">
                </div>
                
                <div class="flexbox-creditcard">
                    <div class="form-group">
                        <label for="expires">Expire Date <span class="required">*</span></label>
                        <input type="text" id="expires" name="expires" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ccv">CCV <span class="required">*</span></label>
                        <input type="number" id="ccv" name="ccv" class="form-control">
                    </div>
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