<div class="modal" tabindex="-1" role="dialog" id ="bevestiging">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Beste</p>
                <p>Bedankt voor de inschrijving!</p>
                <p>Dit is enkel een bevestigingsmail</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" href=<?php echo site_url()?>> Home!</a>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#bevestiging').modal('show');
    });
</script>