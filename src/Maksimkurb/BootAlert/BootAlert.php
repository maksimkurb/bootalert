<?php
/**
 * Created by PhpStorm.
 * User: maksimkurb
 * Date: 31.05.14
 * Time: 22:27
 */

namespace Maksimkurb\BootAlert;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class BootAlert {

    protected static $bootAlertTemplate;

    public static function add($type, $message, $dismissable=true) {
        $alertList = Session::get('__maku_bootalert', array());
        $alertList[] = array($type, $message, $dismissable);
        Session::put('__maku_bootalert', $alertList);
    }

    /*
     * Laravel 4 only
     */
    public static function addValidator($type, $validator, $dismissable=true) {
        if($validator->fails()) {
            foreach($validator->messages()->all() as $error)
            {
                BootAlert::add($type, $error, $dismissable);
            }
        }
    }

    public static function display() {

        BootAlert::$bootAlertTemplate = Config::get('bootalert::alert.template');

        $alerts="";
        foreach (Session::get('__maku_bootalert', array()) as $alert) {
            $alerts .= BootAlert::parseAlert($alert);
        }
        Session::forget('__maku_bootalert'); //We are already displayed this alerts - we no should display they again
        return $alerts;
    }

    private static function parseAlert($alert) {
        $type = $alert[0];
        $message = $alert[1];
        $dismissable = $alert[2];

        if ($dismissable) {
            $alert = str_replace(
                '%dm-class',
                Config::get('bootalert::dismiss.class'),
                str_replace(
                    '%dm-button',
                    Config::get('bootalert::dismiss.button'),
                    BootAlert::$bootAlertTemplate
                )
            );
        } else {
            $alert = str_replace(
                '%dm-class',
                '',
                str_replace(
                    '%dm-button',
                    '',
                    BootAlert::$bootAlertTemplate
                )
            );
        }

        return
            str_replace(
                '%message',
                $message,
                str_replace( '%type-class',
                                Config::get('bootalert::alert.types.'.$type),
                                $alert
                            )
                        );
    }

} 