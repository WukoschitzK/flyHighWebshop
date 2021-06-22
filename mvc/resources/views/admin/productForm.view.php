<div class="wrapper">
    <h1 class="backendform-h1"><?php echo $product->name; ?></h1>
    <div class="backendform-id"><strong>Product Number: </strong><?php echo $product->id; ?></div>

    <?php foreach ($errors as $error): ?>
        <p class="text-danger"><?php echo $error; ?></p>
    <?php endforeach; ?>

    <form action="products/<?php echo $product->id; ?>/do-edit" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" type="text" class="form-control" name="name" value="<?php echo $product->name; ?>">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="10" class="form-control"><?php echo $product->description; ?></textarea>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="price">Price:</label>
                <input id="price" type="number" class="form-control" name="price" step="0.01" value="<?php echo $product->getPriceFloat(); ?>">
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input id="stock" type="number" class="form-control" name="stock" value="<?php echo $product->stock; ?>">
            </div>
        </div>

        
        <div class="form-group">
            <label for="images[]">Add Images:</label>
            <input id="images[]" type="file" class="form-control-file" name="images[]" multiple>
        </div>


            <div class="form-group">
                <?php if (!empty($product->images)): ?>
                    <div>
                        <?php foreach ($product->images as $image): ?>
                            <div class="form-group">
                                <label class="backendform_img_checkbox">
                                    <input type="checkbox" class="form-check-input" name="delete-images[<?php echo $image; ?>]">
                                    <img class="backendform_img" alt="image of the product" src="storage/<?php echo $image; ?>">
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>Derzeit sind keine Bilder verlinkt.</p>
                <?php endif; ?>
            </div>
        
        <div class="backendform-actions">
          
            <a class="cancel-link" href="dashboard">Cancel</a>

            <div class="btn btn-save">
                <button type="submit">Save</button>
            </div>
        </div>

    </form>
</div>

