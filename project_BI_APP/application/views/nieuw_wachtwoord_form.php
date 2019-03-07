git<div class="col-12 mt-3">
    <?php
        $attributes = array('name' => 'nieuwWachtwoord', 'id' => 'nieuwWachtwoordFormulier', 'role' => 'form');
        echo form_open('Home/nieuwWachtwoord', $attributes);



        echo "<hr />";

        echo form_label('poging1', 'poging1');
        $dataPoging1 = array(  'id' => 'poging1',
            'name' => 'poging1',
            'class' => 'form-control',
            'placeholder' => 'Nieuw wachtwoord',
            'required' => 'required',
            'size' => '30');
        echo form_password($dataPoging1);

        $dataPoging2 = array(  'id' => 'poging2',
            'name' => 'poging2',
            'class' => 'form-control',
            'placeholder' => 'Herhaal wachtwoord',
            'required' => 'required',
            'size' => '30');
        echo form_label('poging2', 'poging2');
        echo form_password($dataPoging2);

        echo form_submit(array("content" => "Wachtwoord opslaan", "class" => "btn btn-primary my-3", "id" => "wachtwoordOpslaan"));
        echo form_close();
    ?>
</div>