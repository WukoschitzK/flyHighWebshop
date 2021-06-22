<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fly High Webshop</title>
    <base href="<?php echo \Core\Helpers\Config::get('app.baseUrl'); ?>">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>


    <header class="main-header">
    
        <div class="header-sticky">
            <nav class="flexbox_webnav wrapper-nav navbar">
                <div class="nav_flexbox">
                    <a class="nav-link" href="home">
                        <svg class="icon-header" id="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110.1 70.7"><style>.st0{fill:#ffd126}.st1{fill:#006fe2}</style><g id="Gruppe_399" transform="translate(1.024 .683)"><path id="Pfad_698" class="st0" d="M22.9.3V8H10.8v4.3h8.7v7.3h-8.7v11.7H1.1V.3h21.8z"/><path id="Pfad_699" class="st0" d="M36.9 24h9.4v7.3H27.2V.3h9.7V24z"/><path id="Pfad_700" class="st0" d="M74.4.3L63.3 21.9v9.4h-9.7v-9.4L42.5.3l9.4-.3 6.4 12.8L63.5.4c0-.1 10.9-.1 10.9-.1z"/></g><g id="Gruppe_400"><path id="Pfad_701" class="st1" d="M20.6 0v7.2H9.2v4h8.2v6.9H9.2v11H.1V0h20.5z"/><path id="Pfad_702" class="st1" d="M34.8 22.2h8.8v6.9H25.7V0h9.1v22.2z"/><path id="Pfad_703" class="st1" d="M71 0L60.5 20.2V29h-9.1v-8.8L41 0h10.4l4.7 10.3L60.7 0H71z"/></g><g id="Gruppe_401" transform="translate(25.043 35.154)"><path id="Pfad_704" class="st0" d="M5 6.3v29.1h-9.1V24h-8.7v11.3h-9.1v-29h9.1v10.5h8.7V6.3H5z"/><path id="Pfad_705" class="st0" d="M19.2 6.3v29.1h-9.1V6.3h9.1z"/><path id="Pfad_706" class="st0" d="M47.2 8.6c1.1 1.5.5.4.9 3.6l-5.6.7c-.3-.6-.6.3-1.3 0-.7-.3-2.5-3.6-3.5-3.6-1.7 0-3.8-.1-4.8 1.1-1.5 2-6.8 10.2-3.4 13 0 2.3 3.7 2.5 4.8 3.6 1.1 1.1 3.8 1.3 6 1.3 2.1 0 5.1-3.4 6.4-5.1l-8.1-.4-.5-4.1h14.8v9.1c-1.3 2.2-3.1 4.1-5.2 5.5-2.5 1.6-5.4 2.4-8.4 2.3-2.7.1-5.4-.6-7.9-1.9-2.2-1.2-4-3-5.1-5.2-2.4-4.8-2.4-10.5 0-15.4 1.2-2.2 2.9-4 5.1-5.2C33.8 6.6 36.5 6 39.2 6c3-.2 6.2.3 8 2.6z"/><path id="Pfad_707" class="st0" d="M85.1 6.3v29.1H76V24h-8.7v11.3h-9.2v-29h9.1v10.5h8.7V6.3h9.2z"/></g><g id="Gruppe_402" transform="translate(23.934 35.154)"><path id="Pfad_708" class="st1" d="M3 3.3v29.1h-9.1V21h-8.7v11.3h-9.1v-29h9.1v10.5h8.7V3.3H3z"/><path id="Pfad_709" class="st1" d="M17.2 3.3v29.1H8.1V3.3h9.1z"/><path id="Pfad_710" class="st1" d="M46.5 5.8c2.4 1.8 3.9 4.5 4.3 7.5h-9.6c-.4-.6-.9-1.1-1.5-1.3-.8-.3-1.6-.5-2.4-.5-1.5-.1-3 .5-4.1 1.7-1 1.3-1.5 3-1.5 4.7 0 2.3.5 4 1.6 5.1 1.3 1.2 3.1 1.8 4.9 1.7 2 0 3.9-.9 5.1-2.6h-7.2v-6.4h14.8v9.1c-1.3 2.2-3.1 4.1-5.2 5.5-2.5 1.6-5.4 2.4-8.4 2.3-2.7.1-5.4-.6-7.9-1.9-2.2-1.2-4-3-5.1-5.2-2.4-4.8-2.4-10.5 0-15.4 1.2-2.2 2.9-4 5.1-5.2C31.8 3.6 34.5 3 37.2 3c3.4-.1 6.6.9 9.3 2.8z"/><path id="Pfad_711" class="st1" d="M83.1 3.3v29.1H74V21h-8.7v11.3h-9.2v-29h9.1v10.5h8.7V3.3h9.2z"/></g></svg>
                    </a>

                    <!-- Mobile Navigation -->
                    <div>
                        <a href="#" class="burger">
                            <svg class="burger_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 469.3 469.3"><path d="M53.3 106.7H416c29.4 0 53.3-23.9 53.3-53.3S445.4 0 416 0H53.3C23.9 0 0 23.9 0 53.3s23.9 53.4 53.3 53.4zM416 181.3H53.3c-29.4 0-53.3 24-53.3 53.4S23.9 288 53.3 288H416c29.4 0 53.3-23.9 53.3-53.3s-23.9-53.4-53.3-53.4zM416 362.7H53.3C23.9 362.7 0 386.6 0 416s23.9 53.3 53.3 53.3H416c29.4 0 53.3-23.9 53.3-53.3s-23.9-53.3-53.3-53.3z"/></svg>
                            <!-- <svg class="burger_icon" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 89.1 53.1" xml:space="preserve"><style>.st0{fill:#422f22}</style><path class="st0" d="M84.1 10H24c-2.8 0-5-2.2-5-5s2.2-5 5-5h60.1c2.8 0 5 2.2 5 5s-2.3 5-5 5zM84.1 53.1H43.2c-2.8 0-5-2.2-5-5s2.2-5 5-5h40.9c2.8 0 5 2.2 5 5s-2.3 5-5 5zM84.1 31.4H5c-2.8 0-5-2.2-5-5s2.2-5 5-5h79.1c2.8 0 5 2.2 5 5s-2.3 5-5 5z"/></svg> -->
                            <svg class="close_icon" height="512" viewBox="0 0 413.348 413.348" width="512" xmlns="http://www.w3.org/2000/svg"><path d="M413.348 24.354L388.994 0l-182.32 182.32L24.354 0 0 24.354l182.32 182.32L0 388.994l24.354 24.354 182.32-182.32 182.32 182.32 24.354-24.354-182.32-182.32z"/></svg>
                        </a>
     
                        <ol class="nav_points">
                            <li>
                                <a href="supersonic">Design your Bike</a>
                            </li>
                            <li>
                                <a href="shop">Shop</a>
                            </li>
                            <li>
                                <a href="about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart">Cart (<?php echo App\Models\Cart::cartProducts();?>)</a>
                            </li>

                            <?php if (\App\Models\User::isLoggedIn()): ?>

                                <?php if (\App\Models\User::getLoggedInUser()->is_admin === true): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard">Dashboard</a>
                                </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a href="account" class="nav-link">Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout">Logout</a>
                                </li>
                                
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login">Login</a>
                                </li>
                                <li>
                                    <a href="signup">Registration</a>
                                </li>
                                
                            <?php endif; ?>
                           
                        </ol>
                    </div>
                </div>
                
                <!-- Webnavigation -->
                <div class="webnav-flexcontainer">
                
                <ul class="nav mainnav">
                    <li>
                        <a href="supersonic">Design your Bike</a>
                    </li>
                    <li>
                        <a href="shop">Shop</a>
                    </li>
                    <li>
                        <a href="about">About</a>
                    </li>
                    
                </ul>

                <ul class="nav mainnav">
                    <li class="nav-item">
                        <a class="nav-link" href="cart">
                            <svg class="header-nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.2 22"><path d="M21.3 12.9L23.2 4c.1-.5-.2-1.1-.7-1.2H6.4L6 .8c0-.4-.4-.8-.9-.8H1C.4 0 0 .5 0 1v.7c0 .6.4 1 1 1h2.8l2.8 14.8c-.7.5-1.1 1.2-1.1 2.1 0 1.3 1 2.4 2.3 2.4C9 22 10 20.9 10 19.6c0-.6-.2-1.3-.7-1.7h8.4c-.4.5-.7 1.1-.7 1.7-.1 1.2.9 2.3 2.1 2.4 1.2.1 2.3-.9 2.4-2.1v-.3c0-.9-.5-1.7-1.3-2.2l.2-1c.1-.5-.2-1.1-.7-1.2H8.8l-.3-1.4h11.8c.5-.1.9-.4 1-.9z"/></svg> 
                            (<?php echo App\Models\Cart::cartProducts();?>)</a>
                        </li>
                    <?php if (\App\Models\User::isLoggedIn()): ?>
                        <?php if (\App\Models\User::getLoggedInUser()->is_admin === true): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard">Dashboard</a>
                        </li>

                        <?php endif; ?>
                        <li class="nav-item">
                                <a href="account" class="nav-link">Account</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="logout">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                        </li>
                        <li>
                            <a href="signup">Registration</a>
                        </li>
                    <?php endif; ?>
                </ul>
                </div>
            </nav>
        </div>

        
    </header>



