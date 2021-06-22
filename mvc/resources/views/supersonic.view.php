<div class="wrapper">
    <form action="cart/add/<?php echo $product->id; ?>" method="post" class="form-inline">
        <div class="flexcontainer-supersonic">
                    <div class="flexcontainer-supersonic-item-img">
                        <?php if (!empty($product->images)): ?>
                            <div>
                                <?php foreach ($product->images as $image) {

                                    echo '<img class="img-supersonic" src="storage/'. $image . '" alt="' . $product->name . '">';
                                    break;  
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="flexcontainer-supersonic-item-text">
                        <h1>
                            <?php echo $product->name; ?>         
                        </h1>
                        <div class="product-price">
                            <?php echo $product->getprice(); ?>
                        </div>
                        <button type="submit" class="btn-add-cart-supersonic">Add to Cart</button>
                    </div>
        </div>
    
        
        <div class="section">
            <h2>Configuration</h2>

                <div>
                    <h3 class="h3-supersonic-config">Select a Tire</h3>

                    <div class="flexcontainer-bike-config">
                        <div class="bike-configuration-select">
                            <input class="bike-configuration-input" type="radio" id="red-tire" name="tire" value="red" checked>
                            <label class="selected_config" for="red-tire">
                                <img class="supersonic_config_img selected_config_img" src="public/img/images/create_your_own/tire_red.png" alt="Red Tire">
                                Red
                            </label>
                        </div>

                        <div class="bike-configuration-select">
                            <input class="bike-configuration-input" type="radio" id="black-tire" name="tire" value="black">
                            <label for="black-tire">
                                <img class="supersonic_config_img" src="public/img/images/create_your_own/tire_black.png" alt="Black Tire">
                                Black
                            </label>
                        </div>

                        <div class="bike-configuration-select">
                            <input class="bike-configuration-input" type="radio" id="pink-tire" name="tire" value="pink" >
                            <label for="pink-tire">
                                <img class="supersonic_config_img" src="public/img/images/create_your_own/tire_pink.png" alt="Pink Tire">
                                Pink
                            </label>
                        </div>

                    </div>
                </div>

                <div>
                    <h3 class="h3-supersonic-config">Select a Frame</h3>

                    <div class="flexcontainer-bike-config">
                        <div class="bike-configuration-select">
                            <input class="bike-configuration-input" type="radio" id="blue-frame" name="frame" value="blue" checked>
                            <label class="selected_config" for="blue-frame">
                                <img class="supersonic_config_img selected_config_img" src="public/img/images/create_your_own/frame_blue.png" alt="Blue Frame">
                                Blue
                            </label>
                        </div>

                        <div class="bike-configuration-select">
                            <input class="bike-configuration-input" type="radio" id="black-frame" name="frame" value="black">
                            <label for="black-frame">
                                <img class="supersonic_config_img" src="public/img/images/create_your_own/frame_black.png" alt="Black Frame">
                                Black
                            </label>
                        </div>

                        <div class="bike-configuration-select">
                            <input class="bike-configuration-input" type="radio" id="pink-frame" name="frame" value="pink">
                            <label for="pink-frame">
                                <img class="supersonic_config_img" src="public/img/images/create_your_own/frame_pink.png" alt="Pink Frame">
                                Pink
                            </label>
                        </div>

                        <div class="bike-configuration-select">
                            <input class="bike-configuration-input" type="radio" id="green-frame" name="frame" value="green">
                            <label for="green-frame">
                                <img class="supersonic_config_img" src="public/img/images/create_your_own/frame_green.png" alt="Green Frame">   
                                Green
                            </label>
                        </div>    
                    </div>
                </div>
            
                <div class="bike-configuration">
                    <h3 class="h3-supersonic-config">Select a Saddle</h3>

                    <div class="flexcontainer-bike-config">
                        <div class="bike-configuration-select">
                            <input class="bike-configuration-input" type="radio" id="black-saddle" name="saddle" value="black" checked>
                            <label class="selected_config" for="black-saddle">
                                <img class="supersonic_config_img selected_config_img" src="public/img/images/create_your_own/saddle_black.png" alt="Black Saddle">
                                Black
                            </label>
                        </div>
                        
                        <div class="bike-configuration-select">
                            <input class="bike-configuration-input" type="radio" id="red-saddle" name="saddle" value="red">
                            <label for="red-saddle">
                                <img class="supersonic_config_img" src="public/img/images/create_your_own/saddle_red.png" alt="Red Saddle">
                                Red
                            </label>
                        </div>
                    </div>
                </div>

                <div class="btn-transform">Transform</div>

        </div>
    </form>
</div>
    
<svg class="stroke-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 821 12.2"><path fill="#0067d1" d="M0 2.6h821v9.6H0z"/><path fill="#ffe886" d="M0 0h816.9v8.3H0z"/></svg>

<div class="wrapper">
    <div class="section">
            <div class="product-details-description">
                <h2>Description</h2>
                <p class="product-details-description-text"><?php echo $product->description; ?></p>
            </div>
    </div>
</div>