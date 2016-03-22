<h1>Black list</h1>
<ul class="list-group">
    <li class="list-group-item" ng-repeat="person in people | blacklist | orderBy:'-hates'">
        <strong class="text-muted">{{ $index + 1 }}.</strong>&nbsp;<strong>{{ person.name }}</strong>&nbsp;({{ person.hates }})
    </li>
</ul>