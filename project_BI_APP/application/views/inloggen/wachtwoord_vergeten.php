<div class="col-12 mt-3">
    <?php
        $attributen = array('name' => 'wachtwoordVergeten', 'id' => 'wachtwoordVergeten');
        echo form_open('Inloggen/mailWachtwoordVergeten', $attributen);
    ?>

    <div class="form-group">
        <?php
            echo form_label('Gebruikersnaam', 'gebruikersnaam');

            $dataGebruikersnaam = array('id' => 'gebruikersnaam',
                'name' => 'gebruikersnaam',
                'class' => 'form-controll',
                'placeholder' => 'gebruikersnaam',
                'required' => 'required');
            echo form_input($dataGebruikersnaam);
            echo form_submit('Bevestig', 'Submit');
            echo form_close();
        ?>
    </div>
</div>
