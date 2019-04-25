<div class="col-12 mt-3">
    <?php
        $attributes = array('name' => 'zwemgroep_toevoegen', 'id' => 'zwemgroepToevoegenFormulier', 'role' => 'form');
        echo form_open('Zwemgroepen/addZwemgroep', $attributes);


        echo "<hr />";

        echo form_label('Groepsnaam', 'groepsnaam');
        $dataNaam = array(
            'id' => 'groepsnaam',
            'name' => 'groepsnaam',
            'class' => 'form-control',
            'type' => 'text',
            'placeholder' => 'groepsnaam',
            'required' => 'required',
            'size' => '30',
            'data-toggle' => 'tooltip',
            'data-placement' => 'left',
            'title' => 'Geef hier de naam op die u wilt geven aan de zwemgroep.'
        );
        echo form_input($dataNaam);

        echo form_label('Weekdag', 'weekdag');
        $inhoudWeekdag = array(
            'maandag' => 'Maandag',
            'dinsdag' => 'Dinsdag',
            'woensdag' => 'Woensdag',
            'donderdag' => 'Donderdag',
            'vrijdag' => 'Vrijdag');
        $dataWeekdag = array(
            'id' => 'weekdag',
            'name' => 'weekdag',
            'class' => 'form-control',
            'required' => 'required',
            'data-toggle' => 'tooltip',
            'data-placement' => 'left',
            'title' => 'Geef hier de naam op die u wilt geven aan de zwemgroep.');
        echo form_dropdown($dataWeekdag, $inhoudWeekdag);

        echo form_label('Zwemniveau', 'zwemniveau');

        $inhoudZwemniveau = array();
        foreach ($zwemniveaus as $zwemniveau) {
            $inhoudZwemniveau[$zwemniveau->id] = $zwemniveau->niveauNaam;
        }
        $dataZwemniveau = array(
            'id' => 'zwemniveau',
            'name' => 'zwemniveau',
            'class' => 'form-control',
            'required' => 'required');
        echo form_dropdown($dataZwemniveau, $inhoudZwemniveau);

        echo form_label('Max. Grootte', 'maxGrootte');
        $dataGrootte = array(
            'id' => 'maxGrootte',
            'name' => 'maxGrootte',
            'class' => 'form-control',
            'type' => 'number',
            'placeholder' => 'grootte',
            'required' => 'required');
        echo form_input($dataGrootte);

        echo form_label('Beginuur', 'beginuur');
        $dataBeginuur = array(
            'id' => 'beginuur',
            'name' => 'beginuur',
            'class' => 'form-control',
            'required' => 'required',
            'type' => 'time');
        echo form_input($dataBeginuur);

        echo form_label('Einduur', 'einduur');
        $dataEinduur = array(
            'id' => 'einduur',
            'name' => 'einduur',
            'class' => 'form-control',
            'required' => 'required',
            'type' => 'time');
        echo form_input($dataEinduur);

        echo form_hidden('gebruiker', $gebruiker->id);

        echo form_submit(array("value" => "Toevoegen", "class" => "btn btn-primary my-3", "id" => "voegZwemgroepToe"));
        echo form_close();

    ?>
</div>