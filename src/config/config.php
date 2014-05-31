<?php

return array(

    'alert' => array (
        /*
         * ----------------
         * Alert template
         * ----------------
         *
         * This is HTML template of alert.
         * You can use this reserved words in template:
         * %type-class - Class of selected alert type (see information below)
         * %dm-class   - Class, which will be added to alert, if it is dismissable.
         * %dm-button  - Button/link, which will be added to alert, if it is dismissable. (see information below)
         * %message    - Alert message.
         *
         * By default there are template of BS3 alert.
         *
         */
        'template' => '<div class="alert %type-class %dm-class">%dm-button %message</div>',

        /*
         * -------------
         * Alert types
         * -------------
         *
         * There you can set available types of alerts, for example success/fail/info/etc.
         *
         * Each type has to be issued, as shown below:
         * 'TYPE_NAME' => 'CLASS_NAME',
         * Of course, you can add multiple class names, divided by a space, for example:
         * 'fail' => 'alert-fail bg-fail text-bigger'
         *
         * By default there are types of BS3.
         *
         * Note: types are caSe-sEnsiTive
         *
         */
        'types' => array(
            'success' => 'alert-success',
            'info' => 'alert-info',
            'warning' => 'alert-warning',
            'danger' => 'alert-danger'
        )
    ),
    'dismiss' => array(
        /*
         * -------------------------
         * Dismissable alert class
         * -------------------------
         *
         * Class(es) of dismissable alert
         *
         * By default there are dismissable alert class of BS3 alert.
         *
         */
        'class' => 'alert-dismissable',

        /*
         * ----------------------------------
         * Dismissable alert dismiss button
         * ----------------------------------
         *
         * Button/link, which will be added to alert, if it is dismissable
         *
         * By default there are dismiss button of BS3 alert.
         *
         */
        'button' => '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',
    )

);