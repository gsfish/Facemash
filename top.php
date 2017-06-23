<html>
<head>
    <meta name="description" content="Facemash Celebrities Top 100"/>
    <meta name="keywords" content="Facemash, Celebrities, Top 100, Top, Rating"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Top 100 - Facemash</title>
    <link type="text/css" rel="stylesheet" href="assets/css/facemash-main.css"/>
</head>
<body>
<table cellspacing="0" class="facemash">
    <tr class="facemash">
        <th class="facemash"><a href="/" class="facemash">FACEMASH</a></th>
    </tr>
    <tr class="facemash">
        <td class="facemash">
            <p class="firstline">Top Faces</p>

            <div id="imgBlock">
                <table border="0" align="center" class="images">
                    <?php
                    require("process/connect.php");
                    $conn = new DB();
                    $order = 0;
                    $sql = "SELECT * FROM `stu` ORDER BY `score` DESC LIMIT 100;";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_array()) {
                        $order++;
                    ?>

                        <tr id="<?php echo $order;?>">
                            <td align="center">
                                <a href="#<?php echo $order; ?>" class="hotname">
                                    <p>
                                        <img src="<?php echo $row['img']; ?>" title="<?php echo $row['college']; ?>" align="bottom" height="320" width="216"/>
                                    </p>
                                    <?php echo "#${order}. ${row['name']} (${row['score']})"; ?>
                                </a>
                                <br/><br/>
                            </td>
                        </tr>

                    <?php }?>
                </table>
            </div>
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
</body>
</html>