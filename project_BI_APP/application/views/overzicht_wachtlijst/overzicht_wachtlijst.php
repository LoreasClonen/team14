<?php echo '<div class="row"><div class="col-12">' . anchor("Home/index", "Terug", "class='btn btn-secondary'") . '<hr></div>'; ?>
<div style="width: 100%">
    <div id="accordion">
        <?php
        $i = 0;
        foreach ($zwemgroepen as $zwemgroep) {
            $i=$zwemgroep->id ?>
            <div class="card zwemgroep" id="<?php echo "zwemgroep".$i ?>">
                <div class="card-header" id="<?php echo "heading".$i ?>">
                    <div class="row" data-toggle="collapse" data-target="<?php echo "#collapse".$i ?>" aria-expanded="true" aria-controls="<?php echo "collapse".$i ?>">
                        <div class="col-md-2 col-4"><h4 class="mb-0"><?php echo $zwemgroep->groepsnaam ?></h4></div>
                        <div class="col-md-8 col-4"><?php echo $zwemgroep->weekdag ?></div>
                        <div class="col-md-2 col-4 text-right" id="<?php echo "plaatsen".$i ?>"></div>
                    </div>
                </div>
                <div id="<?php echo "collapse".$i ?>" class="collapse" aria-labelledby="<?php echo "heading".$i ?>" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="p-2" id="<?php echo "wachtenden".$i ?>"></div>
                                <button type="button" class="btn btn-primary btnDetail" data-zwemgroepId="<?php echo $i ?>" data-lijst="#wachtenden"> Details </button>
                            </div>
                            <div class="col-2 text-center align-self-center">
                                <button type="button" class="btn btn-primary btnHaalWeg" data-zwemgroepId="<?php echo $i ?>"> < </button>
                                <button type="button" class="btn btn-primary btnVoegToe" data-zwemgroepId="<?php echo $i ?>"> > </button>
                            </div>
                            <div class="col-5">
                                <div class="p-2" id="<?php echo "leden".$i ?>"></div>
                                <button type="button" class="btn btn-primary btnDetail" data-zwemgroepId="<?php echo $i ?>" data-lijst="#leden"> Details </button>
                            </div>
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
                $(id).html(result);
            }
        });
        $.ajax({
            type: "GET",
            url: site_url + "/Wachtlijst/haalAjaxOp_Plaatsen",
            data: {zwemgroepId: zwemgroepId},
            success: function (result) {
                var id = "#plaatsen"+zwemgroepId;
                $(id).html(result);
            }
        })
    }

    function wisselPersoon(zwemgroepId, klantId, statusId) {
        $.ajax({
            type: "GET",
            url: site_url + "/Wachtlijst/updateAjax_Wachtlijst",
            data: {zwemgroepId: zwemgroepId, klantId: klantId, statusId: statusId},
            success: function () {
                $(".zwemgroep").each(function () {
                    var zwemgroepId = $(this).attr('id');
                    zwemgroepId = zwemgroepId.substr(9);
                    haalWachtlijstOp(zwemgroepId);
                });
            },
            error: function (xhr, status, error) {
                alert("fout: " + xhr.responseText);
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
            var zwemgroepId = $(this).attr('data-zwemgroepId');
            var klantLocatie = "#wachtenden" + zwemgroepId + " option:selected";
            var klantId = $(klantLocatie).val();
            wisselPersoon(zwemgroepId, klantId, 2);
        });

        $(".btnHaalWeg").click(function (e) {
            e.preventDefault();
            var zwemgroepId = $(this).attr('data-zwemgroepId');
            var klantLocatie = "#leden" + zwemgroepId + " option:selected";
            var klantId = $(klantLocatie).val();
            wisselPersoon(zwemgroepId, klantId, 1);
        });

        $(".btnDetail").click(function (e) {
            e.preventDefault();
            var zwemgroepId = $(this).attr('data-zwemgroepId');
            var lijst = $(this).attr('data-lijst');
            var klantLocatie = lijst + zwemgroepId + " option:selected";
            var klantId = $(klantLocatie).val();
            window.open(site_url + "/Zwemmer/zwemmerOphalen/" + klantId);
        })
    })
</script>