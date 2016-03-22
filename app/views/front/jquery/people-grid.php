<h1>People</h1>
<div class="row">
    <?foreach($people as $person):?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" data-person="<?=$person['id']?>">
        <div class="thumbnail">
            <img src="<?=$person['photo']?>">
            <div class="caption">
                <p class="card-title"><?=$person['name']?></p>
                <p>
                    <a href="#" data-hate="<?=$person['id']?>" title="Hate this person"
                       class="btn btn-transparent js-hate-button" role="button"
                    >
                        <span class="fa fa-thumbs-down"></span>
                        <span>&nbsp;Hate</span>
                    </a>
                    <span class="text-muted">(<span class="js-hate-count"><?=$person['hates']?></span>)</span>
                    <a href="#" title="Un-hate this person" data-hate="<?=$person['id']?>" style="display: none"
                       class="btn btn-transparent pull-right js-unhate-button" role="button"
                    >
                        <span class="fa fa-heart text-info"></span>
                        <span class="text-info">&nbsp;Un-hate</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <?endforeach?>
</div>