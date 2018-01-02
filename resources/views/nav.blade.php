<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Vue SPA To Do</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <router-link to="/" tag="li" exact data-toggle="collapse" data-target="#navbar">
                    <a>
                        <i class="glyphicon glyphicon-tasks m-r-10"></i>
                        Tasks
                    </a>
                </router-link>

                <router-link to="/completed" tag="li" data-toggle="collapse" data-target="#navbar">
                    <a>
                        <i class="glyphicon glyphicon-thumbs-up m-r-10"></i>
                        Completed
                    </a>
                </router-link>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>