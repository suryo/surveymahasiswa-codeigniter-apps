<div class="col-sm-12">

<a href="<?= base_url('users/add')?>" class="btn btn-primary"> Add Data Users </a>

<br><br>




<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>user_id</th>
            <th>username</th>
            <th>email</th>
            <th>full_name</th>
            <th>phone</th>
            <th>role</th>
            <th>last_login</th>
            <th>action</th>
            
        </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    foreach ($artikel as $key => $value) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['username']?></td>
            <td><?= $value['email']?></td>
            <td><?= $value['full_name']?></td>
            <td><?= $value['phone']?></td>
            <td><?= $value['role']?></td>
            <td><?= $value['last_login']?></td>
            <td>
            <a href="<?= base_url('artikel/edit/'.$value['user_id'])?>" class="btn btn-warning"> edit </a>
            <a href="<?= base_url('artikel/delete/'.$value['user_id'])?>" class="btn btn-danger" onClick="return confirm('Apakah yakin data ini dihapus..?')"> delete </a>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
    
</div>
