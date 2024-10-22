<div class="col-12 mt-3">
    <?php
        $attributes = array('name' => 'nieuwWachtwoord', 'id' => 'nieuwWachtwoordFormulier', 'role' => 'form');
        echo form_open('Inloggen/nieuwWachtwoordControleren', $attributes);

        echo $melding;

        echo "<hr />";

        echo form_label('Nieuw wachtwoord', 'Nieuw wachtwoord');
        $dataPoging1 = array('id' => 'poging1',
            'name' => 'poging1',
            'class' => 'form-control',
            'placeholder' => 'Nieuw wachtwoord',
            'required' => 'required',
            'size' => '30');
        echo form_password($dataPoging1);

        $dataPoging2 = array('id' => 'poging2',
            'name' => 'poging2',
            'class' => 'form-control',
            'placeholder' => 'Herhaal wachtwoord',
            'required' => 'required',
            'size' => '30');
        echo form_label('Herhaal wachtwoord', 'Herhaal wachtwoord');
        echo form_password($dataPoging2);

        echo form_submit(array("value" => "Wachtwoord opslaan", "class" => "btn btn-primary my-3", "id" => "wachtwoordOpslaan"));
        echo form_close();
    ?>
</div>