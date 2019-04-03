<div class="container">

    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h5>Uw gegevens</h5>
                <hr>
            </div>
            <?php
                $attributes = array('name' => 'boeken', 'id' => 'boekingformulier', 'role' => 'form');
                echo form_open('Zwemfeestje/addZwemfeest', $attributes);
            ?>

            <div class="row">
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
                <div class="col-sm-7">
                    <?php
                        echo form_label('Email', 'email');
                        $dataEmail = array('id' => 'email',
                            'name' => 'email',
                            'class' => 'form-control',
                            'placeholder' => 'e-mail',
                            'required' => 'required',
                            'size' => '30');
                        echo form_input($dataEmail);
                    ?>
                </div>
                <div class="col-sm-5">
                    <?php
                        echo form_label('Telefoon', 'telefoon');
                        $dataTelefoon = array('id' => 'telefoon',
                            'name' => 'telefoon',
                            'class' => 'form-control',
                            'placeholder' => '0477000000',
                            'required' => 'required',
                            'size' => '30');
                        echo form_input($dataTelefoon);
                    ?>
                </div>
            </div>
            <?php


            ?>

            <div class="text-center mt-4">
                <h5>Aanvullende gegevens</h5>
                <hr>
            </div>

            <?php
                echo form_label('Hoeveel kinderen komen er?', 'aantalKinderen');
                $dataAantalKinderen = array('id' => 'aantalKinderen',
                    'name' => 'aantalKinderen',
                    'class' => 'form-control',
                    'placeholder' => 'aantal kinderen',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataAantalKinderen);
                echo form_label('Welke maaltijd wenst u voor de kinderen?', 'maatlijd');
                $dataMaaltijd = array('id' => 'maaltijd',
                    'name' => 'maaltijd',
                    'class' => 'form-control',
                    'placeholder' => 'maaltijd',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataMaaltijd);
                echo form_label('Opmerkingen?', 'opmerking');
                $dataOpmerking = array('id' => 'opmerking',
                    'name' => 'opmerking',
                    'class' => 'form-control',
                    'placeholder' => 'Iemand heeft een allergie voor ...',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataOpmerking);
            ?>
        </div>
        <div class="card-footer text-muted text-center">
            <?php
                echo anchor('', 'Annuleren', 'class="btn btn-secondary m-1"');
                echo form_submit(array("value" => "Bevestigen", "class" => "btn btn-primary my-3", "id" => "Zwemfeest"));

                echo form_close();
            ?>
        </div>
    </div>


</div>


<div class="container">
    <div class="col-12 mt-3">

    </div>
</div>


