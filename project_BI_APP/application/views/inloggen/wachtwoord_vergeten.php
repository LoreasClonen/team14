<div class="col-12 mt-3">
    <?php
        $attributen = array('name' => 'wachtwoordVergeten', 'id' => 'wachtwoordVergeten');
        echo form_open('Inloggen/mailWachtwoordVergeten', $attributen);
    ?>

    <div class="form-group">
        <?php
            echo form_label('Email', 'email');

            $dataEmail = array('id' => 'email',
                'type' => 'email',
                'name' => 'email',
                'class' => 'form-control',
                'placeholder' => 'naam@voorbeeld.be',
                'required' => 'required');
            echo form_input($dataEmail);
            echo form_submit(array("value" => "Bevestig", "class" => "btn btn-primary my-3", "id" => "bevestigEmail"));
            echo form_close();
        ?>
    </div>
</div>

