<?php require_once('config.php');?>

<?php
    if (isset($_POST['nama']) && isset($_POST['emel'])){
        $nama =$_POST['nama'];
        $emel = $_POST['emel'];
        $sqlinsert= "INSERT INTO users (nama,emel) VALUES('$nama','$emel');";
    }else{
        $sqlinsert= "INSERT INTO users (nama,emel) VALUES('".generateRandomName()."','".generateRandomEmail()."');";
    }
        if($conn->query($sqlinsert) === TRUE){
        $last_id= $conn->insert_id;
        console_log("Tambahan berjaya");
    }else{
        echo "Gagal :".$sqlinsert." ".mysqli_connect_error();
    }
        $sql = "SELECT * FROM (SELECT * FROM users ORDER BY id DESC LIMIT 5) sub ORDER BY id ASC  ";
        $result = $conn->query($sql);
        echo "<table class='mt-4' id='jadual'><tr style='background:tomato;'><th>ID</th><th>Nama</th><th>Emel</th><th>Dibuat Pada</th><th>Dikemaskini Pada</th></tr>";

    if ($result->num_rows>0){
        //print data
    while ($row=$result->fetch_assoc()) {
        if ($row["id"] == $last_id) {
            echo "<tr style='color:blue;'>";
        }else 
            echo "<tr>";
            echo "<td>".$row["id"]."</td><td>".$row["nama"]."</td><td>".$row["emel"]."</td><td>".$row["created_at"]."</td><td>".$row["updated_at"]."</td></tr>";
        }
    }else{
            echo "<tr><td>Data tiada</td></tr>";
    }
        echo "</table>";
?>

<br/>

<div class="container">
    <FORM>
        <div class="form-group">
            <INPUT TYPE="button" onClick="history.go(0)" VALUE="Masukkan contoh"> atau
        </div>
    </FORM>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return Register('insert')">
        <div class="form-group row">
            <label for="nama" class="col-2">Nama</label>
            <input type="text" class="form-control col-8" id="nama" name="nama" placeholder="Masukkan nama">
        </div>
        <div class="form-group row">
            <label for="emel" class="col-2">Emel</label>
            <input type="email" class="form-control col-8" id="emel" name="emel" aria-describedby="emailHelp" placeholder="Masukan emel">
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>