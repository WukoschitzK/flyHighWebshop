<div class="flexcontainer-header-home">
    <div class="headertext-home-web">
        <h1 class="h1-home">It never get's easier <br> </h1>
        <p class="h1-home-text">you just get better.</p>
    </div>

    <img class="img-home-header" src="public/img/images/home/header.jpg" alt="Picture of an BMX Biker">
</div>

<div class="wrapper flex-container section">
    <img src="public/img/images/home/config_bike.jpg" alt="Create your Own Bike">

    <div class="flex-container-item home-text-bold">
        <p class="home-text-big">Design your bike</p>
        <p>Start designing your own individual BMX Bike in a few simple steps!</p>

        <div class="btn-blue">
            <a class="no-underline" href="supersonic">Start Designing</a>
        </div>
    </div>
</div>

<svg class="stroke-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 821 12.2"><path fill="#0067d1" d="M0 2.6h821v9.6H0z"/><path fill="#ffe886" d="M0 0h816.9v8.3H0z"/></svg>

<div class="wrapper flex-container-reverse section">
    <img class="home-refurbished-bike" src="public/img/images/home/refurbished_bike.jpg" alt="Picture of a refurbished bike">
    <div class="home-text-bold">
        <!-- <p class="text-bold">Or buy one of our secondhand carefully refurbished bikes for a low price!</p> -->
        <p class="home-text-big">Low on budget?</p>
        <p>Buy one of our secondhand carefully refurbished bikes for a low price.</p>

        <div class="btn-blue">
            <a class="no-underline" href="shop">Shop Now</a>
        </div>
    </div>
</div>

<div class="stroke-right-container">
    <svg class="stroke-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 821 12.2"><path fill="#0067d1" d="M0 2.6h821v9.6H0z"/><path fill="#ffe886" d="M4.1 0H821v8.3H4.1z"/></svg>
</div>

<div class="wrapper section">
    <h2 class="h2-center">New in Stock</h2>

<!-- Die 4 zuletzt hinzugefügten Produkte laden -->
    <div class="flexcontainer-products">
        <?php foreach ($products as $product): ?>
            <a class="no-underline" href="products/<?php echo $product->id; ?>">
                
                <div class="product-card">
                    <?php if (!empty($product->images)): ?>
                        <div class="col">
                            <?php foreach ($product->images as $image): ?>
                                <img class="img-thumbnail" src="storage/<?php echo $image; ?>" alt="<?php echo $product->name; ?>">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <h3><?php echo $product->name; ?></h3>
                    <div>
                        <p class="product-card-price"><?php echo $product->getprice(); ?></p>
                    </div>

                </div>
            </a>
        <?php endforeach; ?>
    </div>



    <div class="btn-blue btn-center">
        <a class="no-underline" href="shop">View All</a>
    </div>

    
</div>

<img class="img-objectfit" src="public/img/images/home/bike_house.jpg" alt="Bike in front of a colorful house">

<div class="wrapper section flex-container-reverse flex-sell-bike">
    <div>
        <h2>Sell your bike</h2>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing</p>

        <div class="btn-blue">
            <a class="no-underline" href="#">More Information</a>
        </div>
    </div>

    <img src="public/img/images/home/biker_sell.svg" alt="Sell your Bike Icon">

</div>




