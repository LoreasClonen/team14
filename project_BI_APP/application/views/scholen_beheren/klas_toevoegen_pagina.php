<div class="card-body">
    <?php
        $attributes = array('name' => 'klasToevoegen', 'id' => 'klas', 'role' => 'form');
        echo form_open('Scholen/klasToevoegen/' . $school->id, $attributes);
    ?>

    <?php
        echo form_label('Naam van klas', 'klasnaam');
        $dataKlas = array('id' => 'klasnaam',
            'name' => 'klasnaam',
            'class' => 'form-control',
            'placeholder' => 'naam van klas',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataKlas);

        echo form_label('Is de klas gesubsidieerd?', 'isGesubsidieerd', $attributes);
        $inhoudGesubsidieerd = array('' => '-- gesubsidieerd --', '1' => 'Ja', '0' => 'Neen');

        $dataGesubsidieerd = array(
            'id' => 'isGesubsidieerd',
            'name' => 'isGesubsidieerd',
            'class' => 'form-control',
            'required' => 'required');
        echo form_dropdown($dataGesubsidieerd, $inhoudGesubsidieerd, 'required');
    ?>
</div>

<div class="card-footer text-center">
    <?php
        echo anchor('Scholen/toonSchool/' . $school->id, 'Annuleren', 'class="btn btn-secondary m-1"');
        echo form_submit(array("value" => "Bevestigen", "class" => "btn btn-primary my-3", "id" => "klas"));

        echo form_close();
    ?>
</div>




