<form action="" method="get">
    <input type="text" name="sms" value="<?php echo $_GET['sms'];?>"><br />
    <input type="submit" name="send">
</form>

<?php
if (isset($_GET['send']))
{
    $sentence = strtolower($_GET['sms']);

    function countWords($sentence)
    {
        //Using 'explode' to split words, thereby creating an array of these words
        $wordsArr = explode(' ', $sentence);
        $vals = array_count_values($wordsArr);

        echo "<pre>";
        print_r($vals);
        echo "</pre>";
        foreach ($vals as $key => $value)
        {
            echo "<b>" . $key . "</b> occurs " . $value . " times in this sentence <br/>";
        }
    }
    countWords($sentence);
}
?>