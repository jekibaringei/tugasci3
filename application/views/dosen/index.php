<div class="container">
    <div class="row mt-5">
        <div class="col mt-4">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-solid fa-plus"></i>
</button>
<div class="row mt">
  <div class="col-md-8">

<!-- Awal flashdata -->
<?php if($this->session->flashdata('flash')): ?>
  <div class="row mt-3">
    <div class="col md-8">
    <div class="alert alert-success alert-dismissible fade show" role="alert">Lecture data has been<?= $this->session->flashdata('flash'); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

    </div>
  </div>
  <?php endif; ?>
<!-- Akhir flashdata -->

<div class="row mt-3">
  <div class="col mt-6">
    <form action="" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Type what you want to search." name="keyword">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
          <form action="<?= base_url('dosen')?>" method="post">
        <div class="form group">
            <label for="nip">NIP</label>
            <input type="numeric" name="nip" class="form-control" id="nip" placeholder="Insert a new NIP" >
            <small class="form-text text-danger"><?= form_error('nip'); ?></small>
        </div>
        <div class="form group">
            <label for="namadosen">Lecture Name</label>
            <input type="text" name="namadosen" class="form-control" id="namadosen" placeholder="Insert Lecture's name" >
            <small class="form-text text-danger"><?= form_error('namadosen'); ?></small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- Akhir Modal -->
<!-- Tabel Data Hover -->
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">NIP</th>
      <th scope="col">Lecture Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($dosen as $dsn): ?>
    <tr>
      <th scope="row"><?=$dsn['nip']; ?></th>
      <td><?=$dsn['namadosen']; ?></td>
      <td>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $dsn['id']; ?>">
      <i class="fa-solid fa-pen"></i>
</button>
        <a href="<?php base_url()?>dosen/hapus/<?=$dsn['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?'); "><i class="fa-solid fa-trash-can"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        </div>
    </div>
</div>

<!-- Awal Modal Edit -->
<?php $no = 0;foreach($dosen as $dsn): $no++; ?>
<div class="modal fade" id="editModal<?= $dsn['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <?= form_open_multipart('dosen/ubah'); ?>
        <input type="hidden" name="id" value="<?= $dsn['id']; ?>">
        <div class="form group">
            <label for="nip">NIP</label>
            <input type="numeric" name="nip" class="form-control" value="<?= $dsn['nip']; ?>" id="nip" placeholder="Insert a new NIP" readonly >
        </div>
        <div class="form group">
            <label for="namadosen">Lecture Name</label>
            <input type="text" name="namadosen" class="form-control" value="<?= $dsn['namadosen']; ?>" id="namadosen" placeholder="Insert Lecture's name" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">OK</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Akhir Modal Edit -->