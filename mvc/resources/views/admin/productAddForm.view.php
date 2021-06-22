<div class="wrapper">

    <h1>New Product</h1>

    <?php foreach ($errors as $error): ?>
        <p class="text-danger"><?php echo $error; ?></p>
    <?php endforeach; ?>

    <form action="dashboard/products/do-add" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="price">Price</label>
                <input id="price" type="number" class="form-control" name="price" step="0.01">
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input id="stock" type="number" class="form-control" name="stock">
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="images[]">Add Images</label>
                <input id="images[]" type="file" class="form-control-file" name="images[]" multiple>
            </div>

            <div class="form-group">
                <label for="create_date">Create Date <small>(YYYYMMDD)</small></label>
                <input id="create_date" type="number" class="form-control" name="create_date" step="0.01">
            </div>
            


            <div class="form-group">
                <?php if (!empty($product->images)): ?>
                    <div>
                        <?php foreach ($product->images as $image): ?>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="delete-images[<?php echo $image; ?>]">
                                    <img src="storage/<?php echo $image; ?>">
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>Derzeit sind keine Bilder verlinkt.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="backendform-actions">
          
                <a class="cancel-link" href="dashboard">Cancel</a>

            <div class="btn btn-save">
                <button type="submit">Save</button>
            </div>
        </div>

    </form>
</div>
