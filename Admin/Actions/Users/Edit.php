<?php
    include ("../../../conn.php");
    $id = $_POST['id'];
    $admin_usr = "SELECT * FROM usr WHERE id='$id' ORDER BY usr.id ASC";
    // 2. Thực thi câu lệnh truy vấn (mục đích trả về dữ liệu các bạn cần)
    $query_usr = mysqli_query($conn, $admin_usr);

    // 3. Hiển thị ra dữ liệu bạn vừa lấy được
    $row = mysqli_fetch_array($query_usr);

    if(isset($_POST['sbm'])){
        $role_id = $_POST['role_id'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $address = $_POST['address'];
        $query ="UPDATE `usr` SET `role_id`='$role_id',`name`='$name', 'mail'=$mail, 'address'=$address
        WHERE id=$id";
        $query_run = mysqli_query($conn, $query);
   
        echo "
          <script type='text/javascript'>
                alert('Bạn đã sửa thành công');
                window.location.href='../../index.php?nav=products';
          </script>";         
    }
    
?>
<!-- <form method="POST" action="actions/products/edit.php" enctype="multipart/form-data">
    <input type="hidden" name="id_product" value="<?php echo $row['id'] ;?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="">Loại sản phẩm</label>
            <select name="product_type_id" requied class="form-control">
                <option value="">---Select---</option>
                <option value="1" <?php echo $row['role_id'] == '1' ? 'selected':'' ?> >Smartphone</option>
                <option value="2" <?php echo $row['role_id'] == '2' ? 'selected':'' ?> >Laptop</option>
                <option value="3" <?php echo $row['role_id'] == '3' ? 'selected':'' ?> >PC</option>
                
            </select>
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Thương hiệu</label>
            <select name="brand_id" requied class="form-control">
                <option value="">---Select---</option>
                <option value="1" <?php echo $row['password'] == '' ? 'selected':'' ?> >Apple</option>
               
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Tên sản phẩm</label>
            <input class="form-control" type="text" name="name" value="<?php echo $row['name'];?>">
        </div>
    
        <input class="form-control" type="text" name="name" value="<?php echo $row['mail'];?>">
        <div class="col-md-12 mb-3">
        <br><input class="form-control" type="text" name="name" value="<?php echo $row['address'];?>">
            <button type="submit" name="sbm" class="btn btn-primary form-control">Cập nhật</button>
        </div>
    </div>
</form> -->