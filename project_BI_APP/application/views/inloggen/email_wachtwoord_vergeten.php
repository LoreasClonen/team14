<?php
?>
<div class="container">
    <!-- Button trigger modal -->
    <div class="text-center">
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
            <div class="container">
                <div class="row">
                    <div class="col-2 mr-2"><i class="fas fa-user-circle display-4"></i></div>
                    <div class="col text-left">Kempenrust</br>
                        Aanvraag wachtwoord herstellen
                    </div>
                </div>
            </div>
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aanvraag wachtwoord herstellen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-2"><i class="fas fa-user-circle display-4"></i></div>
                            <div class="col text-left">Kempenrust <br>
                                &lt;no-reply@kempenrust.be&gt;
                            </div>
                        </div>
                        <p>Ontvanger: <?php echo $gebruiker->email ?></p>
                        <hr>
                        <p>Beste <?php echo $gebruiker->voornaam ?></p>
                        <p>Je hebt zonet een aanvraag gedaan om je wachtwoord te veranden. Klik op onderstaande link om
                            een nieuw wachtwoord in te stellen.</p>
                        <p><?php echo anchor('Inloggen/nieuwPaswoord', 'Stel hier uw nieuw wachtwoord in') ?></p>
                        <p>Met vriendelijke groeten</p>
                        <p>Zwembad Kempenrust</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                </div>
            </div>
        </div>
    </div>
</div>
