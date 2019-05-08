<title>Алгорит маркова</title>

<?php
header('Content-Type: text/html; charset=utf-8');
require_once("class_markov.php");
use  \Generator\Markov;
$start = microtime(true);

if ($_POST['text']) {
    $data = $_POST['text'];
    $counts = substr_count($data, '. ');
    $counts += substr_count($data, '!');
    $counts += substr_count($data, '?');
    $gen = new Markov($data, $counts);
    $text = $gen->get_result();
}
?>
<div style="padding: 20px; background-color: aliceblue">
    <form action="" method="post">
        <textarea name="text" style="width: 100%; height: 350px;"></textarea>
        <input type="submit" onClick="return Formdata(this.form)" value="Синонимизировать" style="background-color: red; color: white; padding: 20px;">
    </form>
</div>

<div style="padding: 20px; margin: 20px; background-color: #d3dbe2">
    <?php echo $data; ?>
</div>
<div style="background-color: #848a91; height: 5px;"></div>
<div style="padding: 20px; margin: 20px; background-color: #beffca">
    <?php echo $text; ?>
</div>

<p>Колличество предложений <?php echo $counts; ?> </p>
<?php echo 'Время выполнения скрипта: '.(microtime(true) - $start).' сек.'; ?>
<script>
    function Formdata(data){
        if (data.text != null && data.text.value.length == 0 )
        {
            alert('Заполните поле');
            return false;
        }
    }
</script>
