<div class="col-12 mt-3">
    <?php
    $attributes = array('name' => 'inloggen', 'id' => 'inlogFormulier', 'role' => 'form');
    echo form_open('Sessies/MeldAan', $attributes);



    echo "<hr />";

    echo form_label('naam', 'naam');
    $dataNaam = array(  'id' => 'naam',
                        'name' => 'naam',
                        'class' => 'form-control',
                        'placeholder' => 'Username',
                        'required' => 'required',
                        'size' => '30');
    echo form_input($dataNaam);

    $dataWachtwoord = array(  'id' => 'wachtwoord',
                            'name' => 'wachtwoord',
                            'class' => 'form-control',
                            'placeholder' => 'wachtwoord',
                            'required' => 'required',
                            'size' => '30');
    echo form_label('wachtwoord', 'wachtwoord');
    echo form_password($dataPasswoord);

    echo form_submit(array("content" => "Log in", "class" => "btn btn-primary my-3", "id" => "logIn"));
    echo form_close();
    ?>
</div>

