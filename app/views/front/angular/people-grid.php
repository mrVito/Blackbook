<h1>People</h1>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" ng-repeat="person in people | filter:search">
        <div class="thumbnail">
            <img ng-src="{{ person.photo }}">
            <div class="caption">
                <p class="card-title">{{ person.name }}</p>
                <p>
                    <a href="#" title="Hate this person" class="btn btn-transparent"
                       role="button" ng-click="hate(person, $event)"
                    >
                        <span class="fa fa-thumbs-down"></span>
                        <span>&nbsp;Hate</span>
                    </a>
                    <span class="text-muted">({{ person.hates }})</span>
                    <a href="#" title="Un-hate this person" class="btn btn-transparent pull-right"
                       role="button" ng-click="unhate(person, $event)" ng-hide="person.hates === 0">
                        <span class="fa fa-heart text-info"></span>
                        <span class="text-info">&nbsp;Un-hate</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>