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
      <div class="alert alert-success alert-dismissible fade show" role="alert">Student data has been<?= $this->session->flashdata('flash'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div> -->
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
          <form action="<?= base_url('mahasiswa')?>" method="post">
        <div class="form group">
            <label for="kode">Code</label>
            <input type="numeric" name="kode" class="form-control" id="kode" placeholder="Insert a new code" >
            <small class="form-text text-danger"><?= form_error('kode'); ?></small>
        </div>
        <div class="form group">
            <label for="matakuliah">Learning Subject</label>
            <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Insert a learning subject" >
            <small class="form-text text-danger"><?= form_error('matakuliah'); ?></small>
        </div>
        <div class="form group">
            <label for="sks">SKS</label>
            <input type="numeric" name="sks" class="form-control" id="sks" placeholder="Insert sks" >
            <small class="form-text text-danger"><?= form_error('sks'); ?></small>
        </div>
        <div class="form group">
            <label for="semester">Semester</label>
            <input type="numeric" name="semester" class="form-control" id="semester" placeholder="Insert semester" >
            <small class="form-text text-danger"><?= form_error('semester'); ?></small>
        </div>
        <div class="form group">
            <label for="jurusan">Major</label>
            <select class="form-select" id="jurusan" name="jurusan">
              <option value="">Choose Major</option>
              <?php foreach($jurusan as $j): ?>
              <option><?= $j['namajurusan']; ?></option>
              <?php endforeach; ?>
            </select>
            <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
            <!-- <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Insert a new major" > -->
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
      <th scope="col">Code</th>
      <th scope="col">Learning Subject</th>
      <th scope="col">SKS</th>
      <th scope="col">Semester</th>
      <th scope="col">Major</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($mahasiswa as $mhs): ?>
    <tr>
      <th scope="row"><?=$mhs['kode']; ?></th>
      <td><?=$mhs['matakuliah']; ?></td>
      <td><?=$mhs['sks']; ?></td>
      <td><?=$mhs['semester']; ?></td>
      <td><?=$mhs['jurusan']; ?></td>
      <td>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $mhs['id']; ?>">
      <i class="fa-solid fa-pen"></i>
</button>
        <a href="<?php base_url()?>mahasiswa/hapus/<?=$mhs['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?'); "><i class="fa-solid fa-trash-can"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        </div>
    </div>
</div>

<!-- Awal Modal Edit -->
<?php $no = 0;foreach($mahasiswa as $mhs): $no++; ?>
<div class="modal fade" id="editModal<?= $mhs['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <?= form_open_multipart('mahasiswa/ubah'); ?>
        <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
        <div class="form group">
            <label for="kode">Code</label>
            <input type="numeric" name="kode" class="form-control" value="<?= $mhs['kode']; ?>" id="kode" placeholder="Insert a new code" readonly >
        </div>
        <div class="form group">
            <label for="matakuliah">Learning Subject</label>
            <input type="text" name="matakuliah" class="form-control" value="<?= $mhs['matakuliah']; ?>" id="matakuliah" placeholder="Insert a learning subject" >
        </div>
        <div class="form group">
            <label for="sks">SKS</label>
            <input type="numeric" name="sks" class="form-control" value="<?= $mhs['sks']; ?>" id="sks" placeholder="Insert sks" >
        </div>
        <div class="form group">
            <label for="semester">Semester</label>
            <input type="numeric" name="semester" class="form-control" value="<?= $mhs['semester']; ?>" id="semester" placeholder="Insert semester" >
        </div>
        <div class="form group">
            <label for="jurusan">Major</label>
            <select class="form-select" id="jurusan" name="jurusan">
              <option value="">Click here.</option>
              <?php foreach($jurusan as $j): ?>
              <option><?= $j['namajurusan']; ?></option>
              <?php endforeach; ?>
            </select>
            <!-- <input type="text" name="jurusan" class="form-control" value="<?= $mhs['jurusan']; ?>" id="jurusan" placeholder="Insert a new major" > -->
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