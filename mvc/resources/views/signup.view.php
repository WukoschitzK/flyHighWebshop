
<div class="wrapper frontend-form frontend-form-signup">

        <h2>Sign Up</h2>

        <?php foreach ($errors as $error): ?>
            <p class="text-danger text-center"><?php echo $error; ?></p>
        <?php endforeach; ?>
        
        <form action="do-sign-up" method="post">
            <div class="form-group">
                <label for="email">Email (Username)</label>
                <input id="email" name="email" class="form-control" placeholder="john.doe@gmail.com" type="email">
            </div>   
             
            <div class="form-group form-group-signup">
                <label for="firstname">Firstname</label>
                <input id="firstname" name="firstname" class="form-control" placeholder="John" type="text">
            </div>

            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input id="lastname" name="lastname" class="form-control" placeholder="Doe" type="text">
            </div>
             
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="5" placeholder="John Doe's Address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" placeholder="******" type="password" name="password">
            </div>
            <div class="form-group">
                <label for="password2">Password repeat</label>
                <input id="password2" class="form-control" placeholder="******" type="password" name="password2">
            </div>
            
            <div>
                <button type="submit" class="btn-form">Sign in</button>
            </div>

        </form>
    
</div>
