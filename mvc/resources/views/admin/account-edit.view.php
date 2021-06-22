<div class="wrapper">

    <h2>Edit Account: #<?php echo $user->id; ?></h2>

    <?php
    $flashMessage = \Core\Session::get('flash', null, true);

    /**
     * Gibt es Messages in der Session, geben wir sie hier aus.
     */
    if ($flashMessage !== null) {
        echo "<div\">$flashMessage</div>";
    }
    ?>

    <form action="dashboard/accounts/do-edit/<?php echo $user->id; ?>" method="post">
        <div class="form-group">
            <label for="firstname">Vorname</label>
            <input id="firstname" name="firstname" class="form-control" placeholder="Vorname" type="text" value="<?php echo $user->firstname; ?>">
        </div> 
        <div class="form-group">
            <label for="lastname">Nachname</label>
            <input id="lastname" name="lastname" class="form-control" placeholder="Nachname" type="text" value="<?php echo $user->lastname; ?>">
        </div> 
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" class="form-control" placeholder="Email" type="email" value="<?php echo $user->email; ?>">
        </div> 
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" class="form-control" placeholder="******" type="password" name="password">
        </div> 
        <div class="form-group">
            <label for="password2">Passwort wiederholen</label>
            <input id="password2" class="form-control" placeholder="******" type="password" name="password2">
        </div> 
        <div class="form-group">
            <?php

            /**
             * Standardwert definieren
             */
            $isCheckedParticle = '';

            /**
             * Ist der User ein Admin, überschreiben wir den leeren String mit dem checked-Attribut
             */
            if ($user->is_admin === true) {
                $isCheckedParticle = ' checked';
            }
            ?>
            <input id="isAdmin" type="checkbox" class="form-check-input" name="isAdmin"<?php echo $isCheckedParticle?>>
            <label for="isAdmin" class="form-check-label">Is Admin?</label>
        </div>

        <div class="backendform-actions">
          
            <a class="cancel-link" href="dashboard">Cancel</a>

            <div class="btn btn-save">
                <button type="submit">Save</button>
            </div>
        </div>

    </form>

</div>
