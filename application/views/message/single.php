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
      <button class="btn btn-danger btn-md hidden-value-button" type="button"
              data-toggle="modal"
              value="<?php echo $message['id']; ?>"
              data-target="#delete-message-model">
        <strong><i class="fas fa-trash"></i> Delete</strong>
      </button>
    </div>
    <div class="card-footer text-muted text-right">
      <i class="fas fa-clock text-primary"></i> <?php echo date('h:ia l, d F Y', strtotime($message['date'])); ?>
    </div>
  </div>
</div>

<!-- ##### Delete Comment Model Start ##### -->
<div class="modal fade" id="delete-message-model" tabindex="-1" role="dialog" aria-labelledby="Delete News Modal" aria-hidden="true">
  <?php echo form_open('dashboard/inbox/delete', array('class' => 'modal-dialog modal-dialog-centered', 'role' => 'document')); ?>
    <input type="hidden" name="redirect" value="<?php echo 'dashboard/inbox'; ?>">
    <input type="hidden" name="message_id" class="hidden-value-input">
    <div class="modal-content border border-danger">
      <div class="modal-header">
        <h5 class="modal-title text-muted" id="exampleModalCenterTitle"><span class="fa fa-trash-o color"></span> Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
        <button type="submit" class="btn btn-danger">
          <span class="fa fa-trash-o"></span> Delete
        </button>
      </div>
    </div>
  <?php echo form_close(); ?>
</div>
<!-- ##### Delete Comment Model End ##### -->
