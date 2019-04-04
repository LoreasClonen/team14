<?php
foreach ($personenlijst as $persoon) {
    echo "<div>" . $persoon->voornaam . " " . $persoon->achternaam . "</div>\n";
}