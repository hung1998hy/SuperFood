<?php

namespace App\Interfaces;

interface Notification {
    public static function send($email, $name, $title, $content);
}