<div class="wrapper">
    <h1>404 Not Found</h1>

    <div>
        <?php

        $_message = "Ooooops, <br>this page does not exists.";

        /**
         * Wenn der Controller, in dem der 404 View geladen wird, eine 'message' übergibt, überschreibt sie die standard
         * Fehlermeldung.
         */
        if (isset($message)) {
            $_message = $message;
        }

        echo $_message;

        ?>
    </div>
</div>