<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<script src="<? echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<? echo base_url('assets/js/jquery.mask.min.js') ?>"></script>
<script src="<? echo base_url('assets/js/bootstrap-datetimepicker.min.js') ?>"></script>

<link rel="stylesheet" href="<? echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">


<body>
<div id="examples">
    <div class="col">
      <label>Date</label>
      <input type="text" class="date form-control"/>
      <label>Hour</label>
      <input type="text" class="time"/>
    </div>
</div>
</body>


<script type="text/javascript">
  $(function() {
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
  });

</script>