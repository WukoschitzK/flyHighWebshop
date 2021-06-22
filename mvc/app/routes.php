<?php

return [
    /**
     * Home Route
     */
    '/' => 'HomeController.loadLatestProducts',
    '/home' => 'HomeController.loadLatestProducts',
    

    /**
     * Shop
     */

    '/shop' => 'ShopController.listAllProducts',

    /**
     * Supersonic Bike
     */
    '/supersonic' => 'SupersonicController.showProduct',

    /**
     * About
     */
    '/about' => 'AboutController.loadView',

    /**
     * Auth Routes
     */
    '/login' => 'AuthController.loginForm',
    '/do-login' => 'AuthController.login',
    '/logout' => 'AuthController.logout',

    '/signup' => 'AuthController.signupForm',
    '/do-sign-up' => 'AuthController.signup',
    '/sign-up/success' => 'AuthController.signupSuccess',

    /**
     * Backend Routes
     */
    '/dashboard' => 'AdminController.dashboard',
    '/dashboard/accounts' => 'AdminAccountController.list',
    '/dashboard/accounts/edit/{id}' => 'AdminAccountController.editForm',
    '/dashboard/accounts/do-edit/{id}' => 'AdminAccountController.edit',
    '/dashboard/accounts/delete/{id}' => 'AdminAccountController.deleteForm',
    '/dashboard/accounts/do-delete/{id}' => 'AdminAccountController.delete',
    '/dashboard/products/add' => 'AdminProductController.addForm',
    '/dashboard/products/do-add' => 'AdminProductController.add',
    '/dashboard/products/delete/{id}' => 'AdminProductController.deleteForm',
    '/dashboard/products/do-delete/{id}' => 'AdminProductController.delete',

    '/products/{id}/edit' => 'AdminProductController.editForm',
    '/products/{id}/do-edit' => 'AdminProductController.edit',

    '/orders/{id}/edit' => 'AdminOrderController.editForm',
    '/orders/{id}/do-edit' => 'AdminOrderController.edit',

    // '/user/{id}/edit' => 'AdminUserController.editForm',
    // '/user/{id}/do-edit' => 'AdminUserController.edit',

    /**
     * Product Routes (Frontend)
     */
    '/products' => 'ProductController.list',
    '/products/{id}' => 'ProductController.showProduct', // ProductController.php => ProductController::showProduct($id)
    

    /**
     * Cart Routes
     */
    '/cart' => 'CartController.index',
    '/cart/add/{id}' => 'CartController.addProductToCart',
    '/cart/sub/{id}' => 'CartController.removeProductFromCart',
    '/cart/remove/{id}' => 'CartController.deleteProductFromCart',
    '/cart/update/{id}' => 'CartController.updateProductInCart',

    /**
     * Checkout Routes
     */
    '/checkout' => 'CheckoutController.paymentForm',
    '/checkout/handle-payment' => 'CheckoutController.handlePayment',
    '/checkout/address' => 'CheckoutController.addressForm',
    '/checkout/handle-address' => 'CheckoutController.handleAddress',
    '/checkout/final' => 'CheckoutController.finalOverview',
    '/checkout/do-checkout' => 'CheckoutController.finaliseCheckout',

    /**
     * Account Routes
     */
    '/account' => 'AccountController.editForm',
    '/account/orders' => 'AccountController.orders',
    '/account/do-edit' => 'AccountController.edit'
];
