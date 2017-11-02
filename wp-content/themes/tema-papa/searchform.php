<form id="searchform" role="search" method="get" action="<?php echo home_url('/'); ?>">
    <div class="input-group input-group-lg ">
        <input type="text" class="form-control" name="s" id="s" placeholder="<?php
            echo _m('Cerca nel sito');
        ?>" required >
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit" id="searchsubmit">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>