<div class="col-12">
  <h1 class="pt-3 pb-4"><span class="fas fa-inbox"></span> Inbox</h1>

  <div cass="row">
    <div class="col-8">
      <p>
        <strong>Messages</strong>
        <br/><span class="fas fa-eye text-warning"></span> - <i>Unread Message</i>
        <br/><span class="fas fa-eye text-success"></span> - <i>Read Message</i>
      </p>
    </div>
  </div>

  <div class="pt-3 row">
    <?php for($i = 0; $i < count($messages); $i++): ?>
      <div class="col-12">
        <div class="card shadow mb-4 border-<?php echo $messages[$i]['seen'] == 0 ? 'warning' : 'success'; ?>" style="width: 100%;">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo "{$messages[$i]['name']} {$messages[$i]['surname']}"; ?></h6>
            <div class="dropdown no-arrow">
              <span class="pr-4 small"><i class="fas fa-clock text-primary"></i> <?php echo date('h:iA l, d M Y', strtotime($messages[$i]['date'])); ?></span>
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-eye fa-sm fa-fw text-<?php echo $messages[$i]['seen'] == 0 ? 'warning' : 'success'; ?>"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item text-muted" href="<?php echo base_url('dashboard/inbox/' . $messages[$i]['id']); ?>">
                  <i class="fas fa-envelope"></i> Read Message
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#delete-message-model">
                  <i class="fas fa-trash"></i> Delete Message</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <?php echo word_limiter($messages[$i]['message'], 25); ?>
            <a href="<?php echo base_url('dashboard/inbox/' . $messages[$i]['id']); ?>">
              <strong class="small">Read More</strong>
            </a>
          </div>
        </div>
      </div>
    <?php endfor; ?>
    <div class="col-12">
      <ul class="pagination mt-5">
        <li class="paginate_button page-item previous disabled" id="dataTable_previous">
          <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
        </li>
        <li class="paginate_button page-item active">
          <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a>
        </li>
        <li class="paginate_button page-item ">
          <a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a>
        </li>
        <li class="paginate_button page-item next" id="dataTable_next">
          <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
        </li>
      </ul>
    </div>
  </div>
</div>


<!-- ##### Delete Comment Model Start ##### -->
<div class="modal fade" id="delete-message-model" tabindex="-1" role="dialog" aria-labelledby="News comment confirmation model" aria-hidden="true">
  <?php echo form_open('dashboard/news/delete', array('class' => 'modal-dialog modal-dialog-centered', 'role' => 'document')); ?>
    <input type="hidden" name="redirect" value="<?php echo uri_string(); ?>">
    <input type="hidden" name="page" value="<?php echo $this->input->get('page'); ?>">
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
