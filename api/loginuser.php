<?php
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $db = new PDO('mysql:host=localhost;dbname=db_satwa;', 'root', '');
    $is_Sukses = false;

    $d_result = $db->query("SELECT * FROM user WHERE username='".$user."' AND password='".$pass."'" );
    $d = $d_result->fetch(PDO::FETCH_ASSOC);
    if($d!=null){
        $is_Sukses = true;
    }else{
        $is_Sukses = false;
    }

    $obj_json = new stdClass();
    $obj_json->status=$is_Sukses;
    $obj_json->id=$d['id_user'];
    $obj_json->nama=$d['nama'];
    $obj_json->jabatan=$d['jabatan'];
    $obj_json->telp=$d['no_telp'];
    $obj_json->email=$d['email'];
    $obj_json->alamat=$d['alamat'];
    $obj_json->kelamin=$d['jenis_kelamin'];
    echo json_encode($obj_json);
?>