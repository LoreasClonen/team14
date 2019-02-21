<div class="col-12 mt-3">
    <?php
        $attributenFormulier = array('id' => 'brouwerijFormulier');
        echo form_open('brouwerij/registreer', $attributenFormulier);
    ?>

    <div class="form-group">
        <?php
            echo form_label('Naam', 'naam');
            echo form_input(array('name' => 'naam',
                'id' => 'naam',
                'value' => $brouwerij->naam,
                'class' => 'form-control',
                'placeholder' => 'Naam',
                'required' => 'required'));
        ?>
    </div>
    <?php
        echo form_close();
    ?>
</div>

<div class='col-12 mt-4'> <?php echo anchor('home', 'Terug'); ?> </div>
