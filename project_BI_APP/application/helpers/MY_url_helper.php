<?php
    function divAnchor($uri = '', $title = '', $attributes = '')
    {
        return "<div>" . anchor($uri, $title, $attributes) . "</div>\n";
    }

    function smallDivAnchor($uri = '', $title = '', $attributes = '')
    {
        return "<div class='mt-1'>" .
            anchor($uri, $title, $attributes) . "</div>\n";
    }

?>
