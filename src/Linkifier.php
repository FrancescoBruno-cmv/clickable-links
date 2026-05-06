<?php

namespace FrancescoBrunoCmv\ClickableLinks;

class Linkifier
{
    public static function process(string $text): string
    {
        $text = html_entity_decode($text);
        $text = " " . $text;

        // URL con protocollo (http://, https://, ecc.)
        $text = preg_replace(
            "/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is",
            '$1$2<a href="$3" target="_blank" title="$3">$3</a>',
            $text
        );

        // URL che iniziano con www.
        $text = preg_replace(
            "/(^|[\n ])([\w]*?)((www|wap)\.[^ \,\"\t\n\r<]*)/is",
            '$1$2<a href="http://$3" target="_blank" title="$3">$3</a>',
            $text
        );

        // URL che iniziano con ftp.
        $text = preg_replace(
            "/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is",
            '$1$2<a href="$4://$3" target="_blank" title="$3">$3</a>',
            $text
        );

        // Email standard
        $text = preg_replace(
            "/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+(\.[\w\-\.]+)+)/i",
            '$1<a href="mailto:$2@$3" target="_blank" title="$2@$3">$2@$3</a>',
            $text
        );

        // Email con prefisso mailto:
        $text = preg_replace(
            "/(^|[\n ])(mailto:[a-z0-9&\-_\.]+?)@([\w\-]+(\.[\w\-\.]+)+)/i",
            '$1<a href="$2@$3" target="_blank" title="$2@$3">$2@$3</a>',
            $text
        );

        // Link Skype
        $text = preg_replace(
            "/(^|[\n ])(skype:[^ \,\"\t\n\r<]*)/i",
            '$1<a href="$2" target="_blank" title="$2">$2</a>',
            $text
        );

        return $text;
    }
}