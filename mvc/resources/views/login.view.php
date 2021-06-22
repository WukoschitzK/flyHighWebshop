<div class="wrapper frontend-form">

        <h2>Login</h2>
    
        <?php
        foreach($errors as $error): ?>
            <p class="text-danger"><?php echo $error; ?></p>
        <?php endforeach; ?>
        <form action="do-login" method="post">
            <div>
                <div>
                    <input class="form-input" name="email" placeholder="Email" type="email">
                </div>
            </div>
            <div>
                <div>
                    <input class="form-input" placeholder="Password" type="password" name="password">
                </div>
            </div>
            <div>
                <button type="submit" class="btn-form">Sign in</button>
            </div>
        </form>

        <div class="create-account">
            <p>or</p>
            <div>
                <a class="create-account-link" href="signup">Create Account</a>
            </div>
        </div>
</div>
