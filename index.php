<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="number" id="number" value="0">
            <button type="submit" name="bin">convert from bin</button>
            <button type="submit" name="dec">convert from dec</button>
            <button type="submit" name="hex">convert from hex</button>
        </form>
        <?php
        
        $number = 0;
        if (isset($_POST['bin'])) {
            $number = $_POST['number'];
            if (preg_match("/^[0-1]+$/", $number)) {
                echo "bin = " . $number . "<br>";
                echo "dec = " . bindec($number) . "<br>";
                echo "hex = " . base_convert($number, 2, 16) . "<br>";
                echo "crc32 = " . "%u\n", crc32($number) . "<br>";
                $num3 = base_convert($number, 2, 16);
                $checksum2 = crc32($num3);
                $num2 = bindec($number);
                $checksum = crc32($num2);
                printf("%u\n", $checksum);
                printf("%u\n", $checksum2);
            } else {
                echo "invalid input"; 
            }
        }
        if (isset($_POST['dec'])) {
            $number = $_POST['number'];
            if (is_numeric($number)) {
                echo "bin = " . decbin($number) . "<br>";
                echo "dec = " . $number . "<br>";
                echo "hex = " . dechex($number) . "<br>";
                echo "crc32 = " . crc32($number) . "<br>";
                $num2 = $number;
                $checksum = crc32($num2);
                $k = dechex($checksum);
                printf($k);
            } else {
                echo "invalid input";
            }
        }
        if (isset($_POST['hex'])) {
            $number = $_POST['number'];
            echo "bin = " . base_convert($number, 16, 2) . "<br>";
            echo "dec = " . hexdec($number) . "<br>";
            echo "hex = " . $number . "<br>";
            echo "crc32 = " . crc32($number) . "<br>";
            $checksum = crc32($number);
            $check = dechex($checksum);
            printf($check);
        }
        ?>
    </body>
</html>
