<div class="wrapper">
    <div class="confirm-delete">
        <h3>
            <?php echo "{$user->firstname} {$user->lastname}"; ?> löschen?
        </h3>

        <div class="flexcontainer-delete-y-n">  
            <div class="flexcontainer-delete-no">
                <a href="dashboard">No</a>
            </div>
            <div class="flexcontainer-delete-yes">
                <a href="dashboard/accounts/do-delete/<?php echo $user->id; ?>">Yes</a>
            </div>
        </div>
    </div>
</div>