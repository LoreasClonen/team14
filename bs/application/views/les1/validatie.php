<div class="col-12 mt-3">
    <h3 class="mb-3">Validatie met HTML5</h3>
    <?php
        $attributenFormulier = array('id' => 'mijnFormulier');
        echo form_open('les1/behandelValidatie', $attributenFormulier);
    ?>
    <div class="form-group">
        <?php
            echo form_label('Naam', 'naam');

            $dataNaam = array('id' => 'naam',
                'name' => 'naam',
                'class' => 'form-control',
                'placeholder' => 'Voornaam Achternaam',
                'required' => 'required');
            echo form_input($dataNaam) . "\n";
        ?>
    </div>

    <div class="form-group">
        <?php echo form_label('Twitter', 'twitter'); ?>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">@</span>
            </div>
            <?php
                $dataTwitter = array('id' => 'twitter',
                    'name' => 'twitter',
                    'class' => 'form-control',
                    'placeholder' => '1000hz',
                    'required' => 'required',
                    'pattern' => '^[_A-z0-9]{1,}$',
                    'maxlength' => '15');
                echo form_input($dataTwitter) . "\n"
            ?>
        </div>
    </div>

    <div class="form-group">
        <?php
            echo form_label('E-mail', 'email');
            $dataEmail = array('id' => 'email',
                'type' => 'email',
                'name' => 'email',
                'class' => 'form-control',
                'placeholder' => 'E-mail',
                'required' => 'required');
            echo form_input($dataEmail) . "\n";
        ?>
    </div>

    <div class="form-group">
        <?php
            echo form_label('Wachtwoord', 'wachtwoord');
            $dataWachtwoord = array('id' => 'wachtwoord',
                'name' => 'wachtwoord',
                'class' => 'form-control',
                'placeholder' => 'Wachtwoord',
                'required' => 'required',
                'minlength' => 6,
            );
            echo form_password($dataWachtwoord);
        ?>
    </div>


    <div class="form-group">
        <?php
            $attributenGeslacht = array('required' => 'required');
            echo "<div>" . form_radio('geslacht', 'M', 0, $attributenGeslacht) . "Man" . "</div>\n";
            echo "<div>" . form_radio('geslacht', 'V', 0, $attributenGeslacht) . "Vrouw" . "</div>\n";
        ?>
    </div>

    <div class="form-group">
        <?php
            $attributenVoorwaarden = array('id' => 'voorwaarden', 'required' => 'required');
            echo form_checkbox('terms', '', 0, $attributenVoorwaarden) . "Gebruiksvoorwaarden gelezen en goedgekeurd\n";
        ?>
    </div>

    <div class="form-group">
        <?php echo form_submit('knop', 'Verzenden', "class='btn btn-primary'") ?>
    </div>
    <?php echo form_close(); ?>
</div>


<div class="col-12 mt-3">
    <h3 class="mb-3">Validatie met Bootstrap</h3>
    <?php
        echo haalJavascriptOp("bs_validator.js");
        $attributenFormulier = array('id' => 'mijnFormulier2', 'novalidate' => 'novalidate', 'class' => 'needs-validation');
        echo form_open('les1/behandelValidatie', $attributenFormulier);
    ?>
    <div class="form-group">
        <?php
            echo form_label('Naam', 'naam');

            $dataNaam = array('id' => 'naam2',
                'name' => 'naam',
                'class' => 'form-control',
                'placeholder' => 'Voornaam Achternaam',
                'required' => 'required');
            echo form_input($dataNaam) . "\n";
        ?>
        <div class="valid-feedback">In orde</div>
        <div class="invalid-feedback">Vul dit veld in</div>
    </div>

    <div class="form-group">
        <?php echo form_label('Twitter', 'twitter'); ?>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">@</span>
            </div>
            <?php
                $dataTwitter = array('id' => 'twitter',
                    'name' => 'twitter2',
                    'class' => 'form-control',
                    'placeholder' => '1000hz',
                    'required' => 'required',
                    'pattern' => '^[_A-z0-9]{1,}$',
                    'maxlength' => '15');
                echo form_input($dataTwitter) . "\n"
            ?>
            <div class="valid-feedback">In orde</div>
            <div class="invalid-feedback">Vul dit veld in</div>
        </div>

    </div>

    <div class="form-group">
        <?php
            echo form_label('E-mail', 'email');
            $dataEmail = array('id' => 'email2',
                'type' => 'email',
                'name' => 'email',
                'class' => 'form-control',
                'placeholder' => 'E-mail',
                'required' => 'required');
            echo form_input($dataEmail) . "\n";
        ?>
        <div class="valid-feedback">Geldig e-mailadres</div>
        <div class="invalid-feedback">Ongeldig e-mailadres</div>
    </div>

    <div class="form-group">
        <?php
            echo form_label('Wachtwoord', 'wachtwoord');
            $dataWachtwoord = array('id' => 'wachtwoord2',
                'name' => 'wachtwoord',
                'class' => 'form-control',
                'placeholder' => 'Wachtwoord',
                'required' => 'required',
                'minlength' => 6,
            );
            echo form_password($dataWachtwoord);
        ?>
        <div class="valid-feedback">Geldig wachtwoord</div>
        <div class="invalid-feedback">Wachtwoord moet minstens 6 tekens bevatten</div>
    </div>


    <div class="form-group">
        <div class="form-check">
            <?php
                $attributenGeslacht = array('required' => 'required', 'class' => 'form-check-input');
                echo form_radio('geslacht2', 'M', 0, $attributenGeslacht) . "Man";
            ?>
        </div>
        <div class="form-check">
            <?php
                $attributenGeslacht = array('required' => 'required', 'class' => 'form-check-input');
                echo form_radio('geslacht2', 'V', 0, $attributenGeslacht) . "Vrouw";
            ?>
            <div class="invalid-feedback">Kies je geslacht</div>
        </div>


    </div>

    <div class="form-group">
        <div class="form-check">
            <?php
                $attributenVoorwaarden = array('id' => 'voorwaarden2', 'required' => 'required', 'class' => 'form-check-input');
                echo form_checkbox('terms', '', 0, $attributenVoorwaarden) . "Gebruiksvoorwaarden gelezen en goedgekeurd";
            ?>
            <div class="invalid-feedback">Ga akkoord met de gebruiksvoorwaarden</div>
        </div>
    </div>

    <div class="form-group">
        <?php echo form_submit('knop', 'Verzenden', "class='btn btn-primary'") ?>
    </div>
    <?php echo form_close(); ?>
</div>


<div class='col-12 mt-4'> <?php echo anchor('home', 'Terug'); ?> </div>