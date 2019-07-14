<!-- Modal -->
<div class="modal fade" id="deleteMessageModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border border-danger">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalCenterTitle"><i class="fas fa-trash"></i> Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="col-12">
  <h1 class="pt-3 pb-4"><span class="fas fa-envelope"></span> Read Message</h1>
  <div class="card">
    <div class="card-header text-capitalize">
      <strong>Subject : <i class="text-primary"><?php echo $message['subject']; ?></i></strong>
    </div>
    <div class="card-body">
      <h4 class="card-title mb-3">
        <i class="fas fa-user text-primary"></i> <?php echo "{$message['name']} {$message['surname']}"; ?>
      </h4>
      <ul class="list-group list-group-horizontal pt-2">
        <li class="list-group-item active"><strong>Contect Details</strong></li>
        <li class="list-group-item">
          <a href="<?php echo base_url(); ?>">
            <i class="fas fa-mobile"></i> <span class="font-weight-bolder text-muted"><?php echo $message['phone_number']; ?></span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="<?php echo base_url(); ?>">
            <i class="fas fa-envelope"></i> <span class="font-weight-bolder text-muted"><?php echo $message['email']; ?></span>
          </a>
        </li>
      </ul>
      <hr/>
      <p class="card-text pb-5">
        <?php echo $message['message'] ?>
      </p>
      <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#deleteMessageModel">
        <strong><i class="fas fa-trash"></i> Delete</strong>
      </button>
    </div>
    <div class="card-footer text-muted text-right">
      <i class="fas fa-clock text-primary"></i> <?php echo date('h:ia l, d F Y', strtotime($message['date'])); ?>
    </div>
  </div>
</div>
