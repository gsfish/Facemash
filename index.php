<html>
<head>
    <meta name="description" content="Facemash. The Social Network. Who's Hotter? Click to Choose."/>
    <meta name="keywords" content="Facemash, Celebrities, Rating"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Facemash</title>
    <link type="text/css" rel="stylesheet" href="assets/css/facemash-main.css"/>
</head>
<body>
<div id="fb-root"></div>
<table cellspacing="0" class="facemash">
    <tr class="facemash">
        <th class="facemash"><a href="/" class="facemash">FACEMASH</a></th>
    </tr>
    <tr class="facemash">
        <td class="facemash">
            <p class="firstline">Were we let in for our looks? No. Will we be judged on them? Yes.</p>

            <p class="seconline">Who's Hotter? Click to Choose.</p>

            <div id="hotfaces" class="displaybox">
                <div id="imgBlock">
                    <table border="0" align="center" class="images">
                        <tr>
                        <?php
                        require("process/connect.php");
                        $conn = new DB();
                        $index = 0;
                        $sql = "SELECT * FROM `stu` ORDER BY rand() LIMIT 2;";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_array()) {
                            $index++;
                        ?>

                            <td align="center">
                                <input id="rankimg<?php echo $index; ?>" type="hidden" value="<?php echo $row['id']; ?>">
                                <a href="#" class="hotname" id="ranka<?php echo $index; ?>">
                                    <p>
                                        <img src="<?php echo $row['img']; ?>" title="<?php echo $row['college']; ?>" align="middle" height="320"/>
                                    </p>
                                    <?php echo $row['name']; ?>
                                </a>
                            </td>

                        <?php
                            if ($index == 1) {
                                echo '<td id="or">&nbsp; OR &nbsp;</td>';
                            }
                        }
                        ?>
                        </tr>
                    </table>
                </div>
            </div>
            <br /><br />
            <br /><br />
            <br /><br />

            <div class="footer">
                <div class="container">
                    <ul>
                        <li><a href="about.php" class="bottom">About</a></li>
                        <li><a href="/" class="bottom">Facemash</a></li>
                        <li><a href="top.php" class="bottom">Top 100</a></li>
                    </ul>
                </div>
            </div>
        </td>
    </tr>
</table>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="assets/js/fashmash.js"></script>
</body>
</html>