<?php
$file1 = fopen("userPlaylist.txt", "r");
$userPlaylistName = explode(",", fgets($file1));
fclose($myfile);

$file2 = fopen("Ztunes.txt","r");
$ZtunesArray = explode(",", fgets($file2));
fclose($file2);

$file3 = fopen("Zmazon.txt","r");
$ZmazonArray = explode(",",fgets($file3));
fclose($file3);

$file4 = fopen("songs.txt", "r");
$songsArray = explode(",",fgets($file4));
fclose($file4);
?>
<html>
<div class = "mySongs"; id ="1"><h2>My Songs</h2>
    <div style="overflow-scrolling: auto; height:200px; width:400px">
        <form method ="post">
            <select>
                <option selected="selected">Choose a playlist</option>
                <?php
                foreach($userPlaylistName as $playlist){
                    ?>
                    <option value="<?php echo strtolower($playlist); ?>"><?php echo $playlist; ?></option>
                    <?php
                }
                ?>
            </select>
            <input type="submit" value="Submit">
            <?php
            echo ("<br>");
            $end = end($songsArray);
            foreach ($songsArray as $song){
                if($end != $song) {
                    ?>
                    <input type="checkbox" name="options[]"
                           value="<?php echo strtolower($song); ?>"/><?php echo $song; ?>
                    <?php
                    echo("<br>");
                }
            }
            ?>
            <input type="submit" value="Delete" />
        </form>
    </div>
</div>
<div class= "storeZtunes"; id="2"><h2>Ztunes Store</h2>
    <div style="overflow-scrolling: auto; height:200px; width:400px">
        <form method ="post" action="MyMusic.php">
            <?php
            foreach ($ZtunesArray as $songFromStore1){
                ?>
                <input type="checkbox" name="options[]" value="<?php echo strtolower($songFromStore1); ?>"/><?php echo $songFromStore1; ?>
            <?php
                echo("<br>");
            }
            //Found this part on the internet but dont know how to use it
            ?>
            <input type="submit" value="Buy" onclick = "return RefreshWindow(true);"/>
            <?php
            if(isset($_POST['options']) && is_array($_POST['options'])){
                $songsFile = fopen("songs.txt","a");
                foreach ($_POST['options'] as $songAdd){
                    fwrite($songsFile, $songAdd .",");
                }
                fclose($songsFile);
            }
            ?>
        </form>
    </div>
</div>
<div class ="storeZamazon"; id ="3"><h2>Zmazon Store</h2>
    <div style="overflow-scrolling: auto; height:200px; width:400px">
        <form method ="post" action="MyMusic.php">
            <?php
            foreach ($ZmazonArray as $songFromStore2){
                ?>
                <input type="checkbox" name="options2[]" value="<?php echo strtolower($songFromStore2); ?>"/><?php echo $songFromStore2; ?>
                <?php
                echo("<br>");
            }
            ?>
            <input type="submit" value="Buy" />
            <?php
            if(isset($_POST['options2']) && is_array($_POST['options2'])){
                $songsFile2 = fopen("songs.txt","a");
                foreach ($_POST['options2'] as $songAdd2){
                    fwrite($songsFile, $songAdd2 .",");
                }
                fclose($songsFile);
            }
            ?>
        </form>
    </div>
</div>
<style>
    body {
        background-color: hotpink;
    }
    h2 {
        color: navy;
        margin-left: 20px;
    }
    form{
        color: gold;
    }
    input{
        color: gold;
    }
    select{
        color: gold;
    }

</style>
</html>
