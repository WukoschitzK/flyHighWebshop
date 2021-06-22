<div class="wrapper">
    <div class="confirm-delete">
        <h3>
            <?php echo "{$product->name}"; ?> löschen?
        </h3>


        <div class="flexcontainer-delete-y-n">  
            <div class="flexcontainer-delete-no">
                <a href="dashboard">No</a>
            </div>
            <div class="flexcontainer-delete-yes">
                <a href="dashboard/products/do-delete/<?php echo $product->id; ?>">Yes</a>
            </div>
        </div>
    </div>
</div>