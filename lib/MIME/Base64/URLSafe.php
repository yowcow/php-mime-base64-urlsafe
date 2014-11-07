<?php

namespace MIME\Base64;

class URLSafe
{
    public static function b64encode($str)
    {
        $data = base64_encode($str);

        # $data =~ tr|+/=|\-_|d
        $data = preg_replace('/[\=]+\z/', '', $data);
        $data = strtr($data, '+/=', '-_');

        return $data;
    }

    public static function b64decode($data)
    {
        #$data =~ tr|\-_\t-\x0d |+/|d;
        $data = strtr($data, '-_', '+/');
        $data = preg_replace('/[\t-\x0d\s]/', '', $data);

        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }

        return base64_decode($data);
    }
}
