<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cards</title>
</head>
<body>
<style>
    @font-face {
        font-family: 'icomoon';
        src: url('icomoon.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    body {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        height: 100vh;
    }

    main {
        width: 60%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        height: 100%;
    }

    .card {
        margin: 5px 20px;
        position: relative;
        width: 95px;
        height: 120px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
    }

    .card:hover {
        box-shadow: 0 0 5px 3px #333;

    }

    .center {
        width: 55px;
        height: 75px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        font-size: 24px;
    }

    .small {
        position: absolute;
        width: 20px;
        height: 20px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        font-size: 14px;
        color: lightgray;
    }

    .up {
        top: 0;
        left: 0;
    }

    .down {
        bottom: 0;
        right: 0;
        transform: rotateZ(180deg);

    }

    .card:last-child > div:before {
        content: "\1f5d3";
    }
</style>
<main>
    <?php
    $cards = array();
    function cards($start, $count)
    {
        $cards[] = 0;
        $cards[] = $start;
        $cards[] = $start + 1;
        for ($i = 1; $i < ($count - 3); $i++) {
            $j = count($cards) - 1;
            $cards[] = $cards[$j - 1] + $cards[$j];
        }
        $cards[] = '?';
        $cards[] = '';
        return $cards;
    }

    $cards = cards(1, 12);
    foreach ($cards as $k => $v) {
        echo "<div class='card' id='$k' onclick='myFunction(id)'><div class='up small'>$v</div><div class='center'>$v</div><div class='down small'>$v</div></div>";
    }
    ?>
</main>

<script>
    function myFunction(id) {
        var x = document.getElementById(id);

        if (x.style.background == 'white') {
            x.style.background = 'blue';
            x.style.color = 'white';
            x.children[1].style.borderColor = 'white';
            x.children[1].style.borderStyle = 'solid';
            x.children[1].style.borderWidth = '1px';
            x.children[1].style.borderRadius = '10px';

        } else {
            x.style.background = 'white';
            x.style.color = 'black';
        }
    }
</script>
</body>
</html>
