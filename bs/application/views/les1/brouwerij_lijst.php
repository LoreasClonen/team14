<div class="col-12 mt-3">
    <?php
        echo '<p>' . anchor('brouwerij/maakNieuwe', 'Brouwerij toevoegen') . '</p>';

        foreach ($brouwerijen as $brouwerij) {
            echo "<div>" . $brouwerij->naam . " " . $brouwerij->plaats . " " . zetOmNaarDDMMYYYY($brouwerij->oprichting) . "</div>\n";
        }
    ?>
</div>

<div class='col-12 mt-4'> <?php echo anchor('home', 'Terug'); ?> </div>