<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <?php View::inject('front.angular.people-grid', ['people' => $people]) ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
        <?php View::inject('front.angular.sidebar') ?>
    </div>
</div>