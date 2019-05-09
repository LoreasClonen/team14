<?php
    /**
     * functie haalJavascriptOp
     * @brief laadt een lokaal javascript bestand in
     * @param $js
     * @return string
     */
    function haalJavascriptOp($js)
    {
        return "<script src=\"" . base_url("assets/js/" . $js) . "\"></script>";
    }

    /**
     * functie haalJavascriptOp
     * @brief laadt een lokaal css bestand in
     * @param $css
     * @return string
     */
    function pasStylesheetAan($css)
    {
        return "<link rel=\"stylesheet\" href=\"" . base_url("assets/css/" . $css) . "\" />";
    }

    function toonAfbeelding($afbeelding, $attributen = '')
    {
        return "<img src=\"" . geefVolledigeNaam($afbeelding) . "\"" . _stringify_attributes($attributen) . " />";
    }

    function geefVolledigeNaam($afbeelding)
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        return base_url() . str_replace('\\', '/', str_replace(FCPATH, "", APPPATH)) . $afbeelding;
    }
