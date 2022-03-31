<?php

namespace App\Listeners;

use Phalcon\Events\Event;
use Settings;

class notificationListeners
{

    public function beforeSend(Event $event, $values, $settings)
    {

        //setting object me dafult value hai database ki , tgas bhi hai database ke
        // values me form se get kri hui values hai

        // die();

        echo "<pre>";
        print_r($values);
        echo "</pre>";

        echo "after jdon decode setting look like <br>";
        print_r(json_decode(json_encode($settings[0])));
        //  die();
        if ($settings[0]->Title_Optimization == "with_tags") {
            $values->name = $values->name . " " . $values->tags;
        }
        if ($values->price == '') {
            $values->price = $settings[0]->Default_price;
        }
        if ($values->stock == '') {
            $values->stock = $settings[0]->Default_Stock;
        }

        echo "after doing changes<br>";
        echo "<pre>";
        echo "my values <br>";
        print_r($values);
        echo "</pre>";

        // die();
        return $values;
    }

    public function afterSend(Event $event, $values, $settings)
    {

        echo "before changes <pre>";
        print_r($values);
        echo "</pre>";

        if ($values->czipcode == '') {
            $values->czipcode = $settings[0]->Default_Zipcode;
        }
        echo "after doing changes<br>";
        echo "<pre>";
        print_r($values);
        echo "</pre>";
        // die();
        return $values;
    }

    // public function beforeHandleRequest(Event $event, \Phalcon\Mvc\Application $application)
    // {
    //     $aclFile = APP_PATH . '/security/acl.cache';
    //     if (true == is_file($aclFile)) {
    //         $acl = unserialize(
    //             file_get_contents($aclFile)
    //         );

    //         $role = $application->request->get("role");
    //         if (!$role || true !== $acl->isAllowed($role, 'test', 'eventtest')) {
    //             echo "Access denied :(";
    //             die();
    //         } else {
    //             // echo "we don't find any acl list try after somtiome";
    //         }
    //     }
    // }
}
