<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dek-D Intern Homework Back-end</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script>
        function countText (param) {
            if (param == 1) {
                head = document.getElementById('head').value;
                headCount = head.length+1;
                document.getElementById('countHead').innerHTML = headCount;
            }else{
                read = document.getElementById('info').value;
                readCount = read.length+1;
                document.getElementById('countRead').innerHTML = readCount;
            }
        }
    </script>
</head>
<body>
    <article class="text-center">
        <section>
            <?php   
                if (isset($_POST['post_blog'])) {
                    $head = $_POST['head'];
                    $read = $_POST['info'];
                    if (strlen($head) < 140 && strlen($read) < 2000) {
                        function isHTML($strHead)
                        {
                          return preg_match("/<[^<]+>/",$strHead,$m) != 0;
                        }
                        if (isHTML($head)) {
                            echo "<script>alert('Cant use HTML tag')</script>";
                        }else{
                            echo "<br><div id='header'>";
                            echo $head;
                            echo "</div><br>";
                            echo "<div id='reader'>";
                            echo $read;
                            echo "</div>";
                        }                    
                    } else {
                    echo "หัวข้อกระทู้หรือเนื้อหากระทู้เกินจำนวนที่กำหนด";
                    }
                }
            ?>
        </section><br>
        <section>
            <form method="POST" action="index.php">
                หัวข้อกระทู้<br>
                <input type="text" minlength="4" size="70" name="head" id="head" onkeypress="countText(1)"><div id="countHead">0</div><br>
                เนื่อหากระทู้<br>
                <textarea cols="73" rows="18" name="info" id="info" minlength="6" onkeypress="countText(2)"></textarea><div id="countRead">0</div><br>
                <button type="submit" name="post_blog">Submit</button>
            </form>
        </section>
    </article>
</body>
</html>