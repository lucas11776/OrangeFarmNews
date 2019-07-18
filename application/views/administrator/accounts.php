<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-5 pb-2 pt-2">
  <h1 class="h3 mb-0 text-gray-800">
    <span class="fas fa-newspaper text-primary"></span> Manage Blog
  </h1>
</div>
<!-- Content Row -->
<div class="col-12">
  <table class="table">
    <thead class="thead-primary">
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Date</th>
        <th scope="col">role</th>
        <th scope="col">Username</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php for($i = 0; $i < count($accounts); $i++): ?>
        <?php if($accounts[$i]['role'] == 0): ?>
        <tr class="bg-danger text-white">
        <?php elseif($accounts[$i]['role'] == 1): ?>
        <tr class="bg-light">
        <?php elseif($accounts[$i]['role'] == 2): ?>
        <tr class="bg-warning text-white">
        <?php elseif($accounts[$i]['role'] == 3): ?>
        <tr class="bg-success text-white">
        <?php endif; ?>
            <th scope="row"><?php echo $accounts[$i]['id']; ?></th>
            <td><?php echo $accounts[$i]['date']; ?></td>
            <td><?php echo $this->account::ROLE[$accounts[$i]['role']]; ?></td>
            <td><?php echo $accounts[$i]['username']; ?></td>
            <td><?php echo $accounts[$i]['name']; ?></td>
            <td><?php echo $accounts[$i]['surname']; ?></td>
            <td><?php echo $accounts[$i]['email']; ?></td>
            <td title="View Account">
              <a href="<?php echo base_url('dashboard/account/'.$accounts[$i]['id']); ?>">
                <i class="fas fa-eye"></i>
              </a>
            </td>
        </tr>
      <?php endfor; ?>
    </tbody>
  </table>

</div>

<div class="col-12 pt-4 pb-4 mt-4 mb-4">
  <nav aria-label="Pagination for news">
    <!-- ##### Pagination Link ##### -->
    <?php echo $this->pagination->create_links(); ?>
  </nav>
</div>
<!-- Content Row -->


<!-- ##### Delete Comment Model Start ##### -->
<div class="modal fade" id="delete-news-model" tabindex="-1" role="dialog" aria-labelledby="News comment confirmation model" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content border border-danger">
      <div class="modal-header">
        <h5 class="modal-title text-muted" id="exampleModalCenterTitle"><span class="fa fa-trash-o color"></span> Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
        <button type="button" class="btn btn-danger">
          <span class="fa fa-trash-o"></span> Delete
        </button>
      </div>
    </div>
  </div>
</div>
<!-- ##### Delete Comment Model End ##### -->
