<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>reddit (A Laravel Project)</title>

    <link href="{{ asset('/css/reddit.css') }}" rel="stylesheet">
    <link rel="icon" href="//www.redditstatic.com/icon.png" sizes="256x256" type="image/png">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="{{url('/img/reddit_icon.png')}}" class="img-responsive"/>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><label class="navbar-brand">mysubreddit</label></li>
                <li>
                    <form action="http://www.reddit.com/search" role="search">
                        <input type="searchbox" name="search_query" placeholder="Search Here" class="navbar-text" size="100">
                    </form>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><img src="{{url('img/email_icon.png')}}" id="email_reddit"> messages (0)</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">profile<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">settings</a></li>
                        <li><a href="#">logout</a></li>
                    </ul>
                </li>
            </ul>

        </div>

    </div>
</nav>
    <div class="nav">
        <div class="tabs">
            <!--<ul class="nav navbar-nav navbar">-->
            <ul class="nav nav-tabs">
                <li class="">
                    <a class="tab-content" href="{{url('/reddit/subscribed')}}" role="tab"><span class="">subscribed</span></a>
                </li>
                <li class="">
                    <a class="tab-content" href="{{url('/reddit/explore')}}" role="tab"><span class=""></span>explore</a>
                </li>
                <li class="">
                    <a class="tab-content" href="{{url('/reddit/everything')}}" role="tab"><span class=""></span>everything</a>
                </li>
                <li class="">
                    <a class="tab-content" href="{{url('/reddit/create')}}" role="tab"><span class=""></span>create</a>
                </li>
            </ul>

        </div>
    </div>
@yield('content')

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
