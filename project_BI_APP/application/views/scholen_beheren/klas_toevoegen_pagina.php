<div class="card-body">
    <?php
        $attributes = array('name' => 'klasToevoegen', 'id' => 'klas', 'role' => 'form');
        echo form_open('Scholen/klasToevoegen', $attributes);
    ?>

    <?php
        echo form_label('Klas', 'klas');
        $dataKlas = array('id' => 'klas',
            'name' => 'klas',
            'class' => 'form-control',
            'placeholder' => 'naam van klas',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataKlas);
    ?>
</div>

<div class="card-footer text-center">
    <?php
        echo anchor('Scholen/overzichtKlassen/' . $school->id, 'Annuleren', 'class="btn btn-secondary m-1"');
        echo form_submit(array("value" => "Bevestigen", "class" => "btn btn-primary my-3", "id" => "klas"));

        echo form_close();
    ?>
</div>




