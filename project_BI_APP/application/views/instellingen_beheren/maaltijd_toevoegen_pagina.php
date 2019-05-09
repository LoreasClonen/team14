<div class="card-body">
    <?php
        $attributes = array('name' => 'maaltijdToevoegen', 'id' => 'maaltijd', 'role' => 'form');
        echo form_open('Zwemfeestjes/maaltijdToevoegen', $attributes);
    ?>

    <?php
        echo form_label('Naam van gerecht', 'naam');
        $dataNaam = array('id' => 'naam',
            'name' => 'naam',
            'class' => 'form-control',
            'placeholder' => 'gerecht',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataNaam);

        echo form_label('Prijs van gerecht', 'prijs');
        $dataPrijs = array('id' => 'prijs',
            'name' => 'prijs',
            'class' => 'form-control',
            'type' => 'number',
            'required' => 'required',
            'size' => '30',
            'step' => '.01');
        echo form_input($dataPrijs);
    ?>
</div>

<div class="card-footer text-center">
    <?php
        echo anchor('Zwemfeestjes/toonMaaltijden', 'Annuleren', 'class="btn btn-secondary m-1"');
        echo form_submit(array("value" => "Bevestigen", "class" => "btn btn-primary my-3", "id" => "maaltijd"));

        echo form_close();
    ?>
</div>




