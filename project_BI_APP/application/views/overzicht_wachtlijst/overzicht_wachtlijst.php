<div style="width: 100%">
    <div id="accordion">
        <?php
        $i = 0;
        foreach ($zwemgroepen as $zwemgroep) {
            $i=$zwemgroep->id ?>
            <div class="card zwemgroep" id="<?php echo "zwemgroep".$i ?>">
                <div class="card-header" id="<?php echo "heading".$i ?>">
                    <h3 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="<?php echo "#collapse".$i ?>" aria-expanded="true" aria-controls="<?php echo "collapse".$i ?>">
                            <?php echo $zwemgroep->groepsnaam ?>
                        </button>
                    </h3>
                </div>
                <div id="<?php echo "collapse".$i ?>" class="collapse" aria-labelledby="<?php echo "heading".$i ?>" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5 p-2" id="<?php echo "wachtenden".$i ?>"></div>
                            <div class="col-2 row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary btnHaalWeg"> < </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary btnVoegToe"> > </button>
                                </div>
                            </div>
                            <div class="col-5 p-2" id="<?php echo "leden".$i ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    function haalWachtlijstOp(zwemgroepId) {
        $.ajax({
            type: "GET",
            url: site_url + "/Wachtlijst/haalAjaxOp_Wachtlijst",
            data: {zwemgroepId: zwemgroepId, statusId: 1},
            success: function (result) {
                var id = "#wachtenden"+zwemgroepId;
                $(id).html(result)
            }
        });
        $.ajax({
            type: "GET",
            url: site_url + "/Wachtlijst/haalAjaxOp_Wachtlijst",
            data: {zwemgroepId: zwemgroepId, statusId: 2},
            success: function (result) {
                var id = "#leden"+zwemgroepId;
                $(id).html(result)
            }
        });
    }

    $(document).ready(function () {
        $(".zwemgroep").each(function () {
            var zwemgroepId = $(this).attr('id');
            zwemgroepId = zwemgroepId.substr(9);
            haalWachtlijstOp(zwemgroepId);
        });
        $(".btnVoegToe").click(function (e) {
            e.preventDefault();
            var zwemgroepId = $(this).parents(".zwemgroep").attr('id');
            zwemgroepId = zwemgroepId.substr(9);
        })
    })
</script>