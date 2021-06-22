<div class="wrapper">
    <h1 class="backendform-h1">Order Number: <?php echo $order->id; ?></h1>

    <form action="orders/<?php echo $order->id; ?>/do-edit" method="post">
        <div class="form-group form-group-select">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control form-control-select">
                <?php

                $stati = [
                    'open' => 'Open',
                    'in progress' => 'In Progress',
                    'in delivery' => 'In Delivery',
                    'storno' => 'Storno',
                    'delivered' => 'Delivered'
                ];

                foreach ($stati as $htmlValue => $label) {
                    if ($htmlValue === $order->status) {
                        echo "<option value=\"$htmlValue\" selected>$label</option>";
                    } else {
                        echo "<option value=\"$htmlValue\">$label</option>";
                    }
                }

                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="customer">Customer:</label>
            <input name="customer" id="customer" class="form-control form-control-noedit" readonly value="<?php echo $user->firstname . ' ' . $user->lastname; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control form-control-noedit" readonly value="<?php echo $user->email; ?>">
        </div>
            

        <div class="form-group">
            <label for="delivery_address">Delivery Address:</label>
            <textarea name="delivery_address" id="delivery_address" rows="5" class="form-control"><?php echo $delivery_address->address; ?></textarea>
        </div>

        <div class="form-group">
            <label for="invoice_address">Invoice Address:</label>
            <textarea name="invoice_address" id="invoice_address" rows="5" class="form-control"><?php echo $invoice_address->address; ?></textarea>
        </div>
        
        <div class="form-group">
            <div><strong>Products:</strong></div>
            <?php
            $products = $order->getProducts();

            require_once __DIR__ . '/../partials/productTable.php';
            ?>

        </div>

        <div class="backendform-actions">
            <a class="cancel-link" href="dashboard">Cancel</a>
    
            <div class="btn btn-save">
                <button type="submit">Save</button>
            </div>
        </div>
        
    </form>
</div>
