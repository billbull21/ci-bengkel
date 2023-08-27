<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Data Sparepart</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if(!empty(session()->getFlashdata('message'))) : ?>

                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('message');?>
                </div>
                    
                <?php endif ?>

                <a href="<?php echo base_url('sparepart/create') ?>" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $key => $post) : ?>

                            <tr>
                                <td><?php echo $post['name'] ?></td>
                                <td><?php echo $post['desc'] ?></td>
                                <td><?php echo $post['price'] ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('sparepart/edit/'.$post['id']) ?>" class="btn btn-sm btn-primary">EDIT</a>
                                    <a href="<?php echo base_url('sparepart/delete/'.$post['id']) ?>" class="btn btn-sm btn-danger">HAPUS</a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php echo $pager->links('post', 'bootstrap_pagination') ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>