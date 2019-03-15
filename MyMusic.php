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
                foreach($userPlaylistName as $item){
                    ?>
                    <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
                    <?php
                }
                ?>
            </select>
            <input type="submit" value="Submit">
            <?php
            echo ("<br>");
            foreach ($songsArray as $item1){
                ?>
                <input type="checkbox" name="options[]" value="<?php echo strtolower($item1); ?>"/><?php echo $item1; ?>
            <?php
                echo("<br>");
            }
            ?>
            <input type="submit" value="Delete" />
        </form>
    </div>
</div>
<div class= "storeZtunes"; id="2"><h2>Ztunes Store</h2>
    <div style="overflow-scrolling: auto; height:200px; width:400px">
        <form method ="post">
            <?php
            foreach ($ZtunesArray as $item){
                ?>
                <input type="checkbox" name="options[]" value="<?php echo strtolower($item); ?>"/><?php echo $item; ?>
            <?php
                echo("<br>");
            }
            ?>
            <input type="submit" value="Buy" />
            <?php
            $songsBought = $_POST['options[]'];
                foreach ($songsBought as $song){

            }
            ?>
        </form>
    </div>
</div>
<div class ="storeZamazon"; id ="3"><h2>Zmazon Store</h2>
    <div style="overflow-scrolling: auto; height:200px; width:400px">
        <form method ="post">
            <?php
            foreach ($ZmazonArray as $item){
                ?>
                <input type="checkbox" name="options[]" value="<?php echo strtolower($item); ?>"/><?php echo $item; ?>
                <?php
                echo("<br>");
            }
            ?>
            <input type="submit" value="Buy" />
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
