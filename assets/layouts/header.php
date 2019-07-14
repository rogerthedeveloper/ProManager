<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">ProManager</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
                <li><a href="../app/dashboard.php"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard <span class="sr-only">(current)</span></a></li>

                <li id="section_Tables" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Tables <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <?php

                        $files = glob('../tables/*.php', GLOB_BRACE);
                        foreach($files as $file):

                            $name = ucfirst(substr(basename($file), 0, -4));

                            ?>

                            <li id="<?php echo $name; ?>"><a href="<?php echo $file; ?>"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <?php echo $name; ?></a></li>

                        <?php endforeach; ?>

                        <?php if(!$files): ?>

                            <li><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a></li>

                        <?php endif; ?>



                    </ul>
                </li>

                <li id="section_Views" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Views <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <?php

                            $files = glob('../views/*.php', GLOB_BRACE);
                            foreach($files as $file):

                                $name = ucfirst(substr(basename($file), 0, -4));

                        ?>

                            <li id="<?php echo $name; ?>"><a href="<?php echo $file; ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $name; ?></a></li>


                        <?php endforeach; ?>

                        <?php if(!$files): ?>

                            <li><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a></li>

                        <?php endif; ?>



                    </ul>
                </li>

                <li id="section_Reports" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php

                        $files = glob('../reports/*.php', GLOB_BRACE);
                        foreach($files as $file):

                            $name = ucfirst(substr(basename($file), 0, -4));



                            ?>

                            <li id="<?php echo $name; ?>"><a href="<?php echo $file; ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> <?php echo $name; ?></a></li>

                        <?php endforeach; ?>

                        <?php if(!$files): ?>

                            <li><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a></li>

                        <?php endif; ?>


                    </ul>
                </li>

                <li id="section_Graphics" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Graphics <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php

                        $files = glob('../graphics/*.php', GLOB_BRACE);
                        foreach($files as $file):

                            $name = ucfirst(substr(basename($file), 0, -4));

                            ?>

                            <li id="<?php echo $name; ?>"><a href="<?php echo $file; ?>"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> <?php echo $name; ?></a></li>

                        <?php endforeach; ?>


                        <?php if(!$files): ?>

                            <li><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a></li>

                        <?php endif; ?>



                    </ul>
                </li>



            </ul>

            <ul class="nav navbar-nav navbar-right">


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Support</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Language</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="btnLogout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sign Out</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>