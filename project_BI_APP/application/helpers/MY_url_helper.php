<?php
    /**
     * functie divAnchor
     * @brief maakt een knop
     * @param $uri
     * @param $attributes
     * @param $title
     * @return string
     */
    function divAnchor($uri = '', $title = '', $attributes = '')
    {
        return "<div>" . anchor($uri, $title, $attributes) . "</div>\n";
    }

    /**
     * functie smallDivAnchor
     * @brief maakt een kleine knop
     * @param $uri
     * @param $attributes
     * @param $title
     * @return string
     */
    function smallDivAnchor($uri = '', $title = '', $attributes = '')
    {
        return "<div class='mt-1'>" .
            anchor($uri, $title, $attributes) . "</div>\n";
    }

?>
