<?php 

include 'timers.php';

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.png">

  <title>College Timers</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="bootstrap.min.css">

  <!-- Custom styles for this template -->
  <link href="cover.css" rel="stylesheet">
  <link href="index.css" rel="stylesheet">
</head>

<body class="text-center">

  <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
    </header>

    <main role="main" class="inner cover">
        <div class="row">
            <?php
                foreach($timers as $key => $data) {
            ?>
                    <div class="col-md">
                        <h3><?php echo($key) ?></h3>
                        <hr>
                        <h3 id="<?php echo($data['id']) ?>" class="cover-heading"></h1>
                    </div>
            <?php
                }
            ?>
      </div>
      
    </main>

    <footer class="mastfoot mt-auto">
      <div class="inner">
        <p><strong>Copyright &copy;
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script>
            <a href="https://athfan.com"> Athfan Khaleel</a>.
          </strong> All rights reserved..</p>
      </div>
    </footer>
  </div>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="jquery-3.3.1.slim.min.js" type="-text/javascript"></script>

    <?php 
        foreach($timers as $key => $data) { 
    ?>
        <script>
            var <?php echo("to_".$data['id']) ?> = new Date("<?php echo($data['date']) ?>").getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                
                // Find the difference between the current time and the toDate time..
                <?php
                    if($data['up']) {
                ?>
                    var distance = now - <?php echo("to_".$data['id']) ?>;
                <?php
                    } else{
                ?>
                    var distance = <?php echo("to_".$data['id']) ?> - now;
                <?php
                    }
                ?>

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with it's representive id
                document.getElementById("<?php echo($data['id']) ?>").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
            }, 1000);
        </script>

    <?php
    }
    ?>

</body>

</html>