<?php

echo '<p>De totaalprijs voor de lessen van: <ul>';
foreach ($lessen as $les) {
    echo '<li>' . $les->datumLes . '</li>';
}
echo '</ul> Bedraagt: ' . $totaalprijs . '</p>';