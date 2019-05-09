<?php
/**
 * Created by PhpStorm.
 * User: poire
 * Date: 5/9/2019
 * Time: 2:11 PM
 */

echo '<p>De totaalprijs voor de lessen van: <ul>';
foreach ($lessen as $les) {
    echo '<li>' . $les->datumLes . '</li>';
}
echo '</ul> Bedraagt: ' . $totaalprijs . '</p>';