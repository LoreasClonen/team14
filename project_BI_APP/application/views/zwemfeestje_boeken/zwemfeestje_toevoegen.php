<div class="card-body">
    <div class="text-center">
        <h5>Uw gegevens</h5>
        <hr>
    </div>
    <?php
        $attributes = array('name' => 'boeken', 'id' => 'boekingformulier', 'role' => 'form');
        echo form_open('Zwemfeestjes/aanvragenZwemfeestje', $attributes);
    ?>

    <div class="row">
        <div class="col-sm-12"><?php echo $error ?></div>
        <div class="col-sm-5">
            <?php
                echo form_label('Voornaam', 'voornaam');
                $dataVoornaam = array('id' => 'voornaam',
                    'name' => 'voornaam',
                    'class' => 'form-control',
                    'placeholder' => 'voornaam',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataVoornaam);
            ?>
        </div>
        <div class="col-sm-7">
            <?php
                echo form_label('Achternaam', 'achternaam');
                $dataAchternaam = array('id' => 'achternaam',
                    'name' => 'achternaam',
                    'class' => 'form-control',
                    'placeholder' => 'achternaam',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataAchternaam);
            ?>
        </div>
        <div class="col-sm-7 mt-3">
            <?php
                echo form_label('E-mail', 'email');
                $dataEmail = array('id' => 'email',
                    'name' => 'email',
                    'class' => 'form-control',
                    'type' => 'email',
                    'placeholder' => 'iemand@voorbeeld.be',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataEmail);
            ?>
        </div>
        <div class="col-sm-5 mt-3">
            <?php
                echo form_label('Telefoonnummer', 'telefoonnr');
                $dataTelefoon = array('id' => 'telefoonnr',
                    'name' => 'telefoonnr',
                    'class' => 'form-control',
                    'type' => 'tel',
                    'placeholder' => '0123456789',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataTelefoon);
            ?>
        </div>
    </div>

    <div class="text-center mt-4">
        <h5>Datum en tijdsstip</h5>
        <hr>
    </div>
    <div class="row">
        <div class="col-sm-12"><?php echo $foutUur; ?></div>
        <div class="col-sm-12"><?php echo $fouteDatum; ?></div>
        <div class="col-sm-6">
            <?php
                echo form_label('Datum', 'datum');
                $dataDatum = array('id' => 'datum',
                    'name' => 'datum',
                    'class' => 'form-control',
                    'type' => 'date',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataDatum);
            ?>
        </div>
        <div class="col-sm-3">
            <?php
                echo form_label('Beginuur', 'beginuur');
                $dataBeginuur = array('id' => 'beginuur',
                    'name' => 'beginuur',
                    'class' => 'form-control',
                    'type' => 'time',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataBeginuur);
            ?>
        </div>
        <div class="col-sm-3">
            <?php
                echo form_label('Einduur', 'einduur');
                $dataEinduur = array('id' => 'einduur',
                    'name' => 'einduur',
                    'class' => 'form-control',
                    'type' => 'time',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataEinduur);
            ?>
        </div>
    </div>


    <div class="text-center mt-4">
        <h5>Aanvullende gegevens</h5>
        <hr>
    </div>

    <?php
        echo form_label('Hoeveel kinderen komen er?', 'aantalKinderen');
        $dataAantalKinderen = array('id' => 'aantalKinderen',
            'name' => 'aantalKinderen',
            'class' => 'form-control',
            'type' => 'number',
            'placeholder' => 'aantal kinderen',
            'required' => 'required',
            'size' => '30');
        echo form_input($dataAantalKinderen);

        $attributes = array(
            'class' => 'mt-3'
        );

        echo form_label('Welke maaltijd wenst u voor de kinderen?', 'gerecht', $attributes);
        $inhoudGerecht = array('' => '-- kies uw gerecht --');
        foreach ($gerechten as $gerecht) {
            $inhoudGerecht[$gerecht->id] = $gerecht->naam;
        }
        $dataGerecht = array(
            'id' => 'gerecht',
            'name' => 'gerecht',
            'class' => 'form-control',
            'required' => 'required');
        echo form_dropdown($dataGerecht, $inhoudGerecht, 'required');

        echo form_label('Opmerkingen?', 'opmerkingen', $attributes);
        $dataOpmerkingen = array(
            'id' => 'opmerkingen',
            'name' => 'opmerkingen',
            'class' => 'form-control',
            'placeholder' => 'Vul hier uw opmerkingen in ...',
            'rows' => '5',
            'size' => '255'
        );
        echo form_textarea($dataOpmerkingen);
    ?>
</div>
<div class="card-footer text-center">
    <?php
        echo anchor('Home/index', 'Annuleren', 'class="btn btn-secondary m-1"');
        echo form_submit(array("value" => "Bevestigen", "class" => "btn btn-primary my-3", "id" => "Zwemfeest"));

        echo form_close();
    ?>
</div>



