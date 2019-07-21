<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-5 pb-2 pt-2">
  <h1 class="h3 mb-0 text-gray-800">
    <span class="fas fa-user text-primary"></span> Manage Accounts
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
              <a href="<?php echo base_url('dashboard/accounts/'.$accounts[$i]['id']); ?>">
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
