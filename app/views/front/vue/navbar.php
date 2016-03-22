<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Blackbook</a>
</div>

<div class="collapse navbar-collapse" id="main-navbar">
    <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
    </ul>
    <div class="navbar-form navbar-left">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" v-model="search">
        </div>
    </div>
    <div class="navbar-text navbar-right">
        <span>Blackbook total: {{ blacklistCount }}</span>
    </div>
</div>