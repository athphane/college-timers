<?php
include 'timers.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>College Timers</title>
</head>
<body class="antialiased bg-gray-700">
    <?php
    foreach ($timer_groups as $group => $timer_group_data) {
        ?>
        <p class="text-xl text-base font-bold text-white ml-20"><?php echo $group ?: null ?></p>
        <div class="md:flex px-6">
            <?php
            foreach ($timer_group_data as $key => $data) {
                ?>
                <div class="mx-auto rounded p-6 md:w-1/3">
                    <div class="rounded bg-blue-400 shadow-md h-48 p-6 flex flex-col justify-around uppercase">
                        <div>
                            <p class="text-2xl text-base font-bold text-gray-900 text-center"><?php echo $key ?></p>
                            <p class="text-sm text-red-900 font-medium text-center"><?php echo $data['date'] ?></p>
                        </div>
                        <div>
                            <p id="<?php echo $data['id'] ?>" class="text-2xl text-white font-bold text-center">
                                Loading...
                            </p>
                        </div>

                    </div>
                </div>
                <?php
            } ?>
    </div>
    <?php
    }
    ?>
<?php
foreach ($timer_groups as $timer_group) {
        ?>
<?php
foreach ($timer_group as $key => $data) {
            ?>
    <script>
        var <?php echo 'to_'.$data['id'] ?> =
        new Date("<?php echo $data['date'] ?>").getTime();
        var x = setInterval(function () {
            var now = new Date().getTime();

            // Find the difference between the current time and the toDate time..
            <?php
            if (isset($data['up'])) {
                ?>
            var distance = now - <?php echo 'to_'.$data['id'] ?>;
            <?php
            } else {
                ?>
            var distance = <?php echo 'to_'.$data['id'] ?> -now;
            <?php
            } ?>

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with it's representive id
            document.getElementById("<?php echo $data['id'] ?>").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
        }, 1000);
    </script>
    <?php
        } ?>    <?php
    }
?>
</body>
</html>
