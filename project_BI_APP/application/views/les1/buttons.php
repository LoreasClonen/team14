<div class="col-12 mt-3">
    <p>
        <!-- large buttons -->
        <?php
            $extraButton = array('class' => 'btn btn-primary btn-lg btn-round text-center');
            echo form_button("knopRetweetGroot", "<i class='fas fa-retweet'></i>", $extraButton);
        ?>

        <button type="button" class="btn btn-secondary btn-lg btn-round"><i class="fas fa-share-square"></i></button>
        <button type="button" class="btn btn-success btn-lg btn-round"><i class="fas fa-thumbs-up"></i></button>
        <button type="button" class="btn btn-info btn-lg btn-round"><i class="fas fa-thumbs-down"></i></button>
        <button type="button" class="btn btn-warning btn-lg btn-round"><i class="fas fa-search-plus"></i></span>
        </button>
        <button type="button" class="btn btn-danger btn-lg btn-round"><i class="fas fa-search-minus"></i></button>
    </p>
    <p>
        <!-- default size buttons -->
        <button type="button" class="btn btn-primary btn-round"><i class="fas fa-music"></i></button>
        <button type="button" class="btn btn-secondary btn-round"><i class="fas fa-fast-backward"></i>
        </button>
        <button type="button" class="btn btn-success btn-round"><i class="fas fa-play"></i></button>
        <button type="button" class="btn btn-info btn-round"><i class="fas fa-stop"></i></button>
        <button type="button" class="btn btn-warning btn-round"><i class="fas fa-fast-forward"></i>
        </button>
        <button type="button" class="btn btn-danger btn-round"><i class="fas fa-volume-mute"></i>
        </button>
    </p>
    <p>
        <!-- small buttons -->
        <button type="button" class="btn btn-primary btn-sm btn-round"><i class="fas fa-paperclip"></i>
        </button>
        <button type="button" class="btn btn-secondary btn-sm btn-round"><i class="fas fa-align-left"></i>
        </button>
        <button type="button" class="btn btn-success btn-sm btn-round"><i class="fas fa-align-center"></i></button>
        <button type="button" class="btn btn-info btn-sm btn-round"><i class="fas fa-align-right"></i>
        </button>
        <button type="button" class="btn btn-warning btn-sm btn-round"><i class="fas fa-align-justify"></i></button>
        <button type="button" class="btn btn-danger btn-sm btn-round"><i class="fas fa-trash-alt"></i>
        </button>
    </p>
    <p>
        <!-- extra small buttons -->
        <button type="button" class="btn btn-primary btn-xs btn-round"><i class="fas fa-user"></i></button>
        <button type="button" class="btn btn-secondary btn-xs btn-round"><i class="fas fa-signal"></i></button>
        <button type="button" class="btn btn-success btn-xs btn-round"><i class="fas fa-check"></i></button>
        <button type="button" class="btn btn-info btn-xs btn-round"><i class="fas fa-comment"></i></button>
        <button type="button" class="btn btn-warning btn-xs btn-round"><i class="fas fa-envelope"></i></button>
        <button type="button" class="btn btn-danger btn-xs btn-round"><i class="fas fa-times"></i></span>
        </button>
    </p>
</div>

<div class='col-12 mt-4'> <?php echo anchor('home', 'Terug'); ?> </div>