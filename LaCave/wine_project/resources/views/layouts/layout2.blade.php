<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>
        @yield('titrePage')
    </title>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top bg-dark" >
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <a class="navbar-brand smoothie" href="{{url('/')}}">La Cave <span class="theme-accent-color">à Vins</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/wines')}}" class="page-scroll">Nos vins</a></li>  
                        <li><a href="{{url('/type')}}" class="page-scroll">Nos différents types</a></li>                       
                    </ul>

                </div>
                <!-- /.navbar-collapse -->         

            </div>
            <!-- /.container-fluid -->
        </nav>
    <header>
        @yield('titreItem')
    </header>
    @yield('contenu')
    <footer class= "footer">
        MangaWeb - copyright 3AInfo -2021
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" > </script>
    
</body>
</html>