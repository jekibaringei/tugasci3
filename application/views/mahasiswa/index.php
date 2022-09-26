<div class="container">
    <div class="row mt-5">
        <div class="col mt-4">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Insert Data
</button>

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
        </div>
        <div class="form group">
            <label for="matakuliah">Learning Subject</label>
            <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Insert a learning subject" >
        </div>
        <div class="form group">
            <label for="sks">SKS</label>
            <input type="numeric" name="sks" class="form-control" id="sks" placeholder="Insert sks" >
        </div>
        <div class="form group">
            <label for="semester">Semester</label>
            <input type="numeric" name="semester" class="form-control" id="semester" placeholder="Insert semester" >
        </div>
        <div class="form group">
            <label for="jurusan">Major</label>
            <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Insert a new major" >
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
<!-- Tabel Data -->
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
  Edit
</button>
        <a href="<?php base_url()?>mahasiswa/hapus/<?=$mhs['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?'); ">Delete</a>
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
            <input type="numeric" name="kode" class="form-control" value="<?= $mhs['kode']; ?>" id="kode" placeholder="Insert a new code" >
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
            <input type="text" name="jurusan" class="form-control" value="<?= $mhs['jurusan']; ?>" id="jurusan" placeholder="Insert a new major" >
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