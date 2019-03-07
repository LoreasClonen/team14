<div class="col-12 mt-3">
    <?php
        $attributes = array('name' => 'inloggen', 'id' => 'inlogFormulier', 'role' => 'form');
        echo form_open('Inloggen/ControleerAanmelden', $attributes);


        echo "<hr />";

        echo form_label('email', 'email');
        $dataNaam = array('id' => 'email',
            'name' => 'email',
            'class' => 'form-control',
            'placeholder' => 'e-mail',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataNaam);

        $dataWachtwoord = array('id' => 'wachtwoord',
            'name' => 'wachtwoord',
            'class' => 'form-control',
            'placeholder' => 'wachtwoord',
            'required' => 'required',
            'size' => '30');
        echo form_label('wachtwoord', 'wachtwoord');
        echo form_password($dataWachtwoord);


    echo form_submit(array("value" => "Inloggen", "class" => "btn btn-primary my-3", "id" => "logIn"));
    echo smallDivAnchor('Inloggen/wachtwoordVergeten', 'Wachtwoord vergeten', 'class="btn btn-primary"');
    echo form_close();
    // echo password_hash("admin",PASSWORD_DEFAULT);

    ?>
</div>

