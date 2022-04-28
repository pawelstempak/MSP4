<?php /* views/grouplist.php */ ?>
<div class="flex-shrink-0 p-3 bg-white">
<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
<span class="fs-5 fw-semibold">Groups <i class="bi bi-arrow-right-short"></i> <a class="link-secondary" href="/groupslist">List</a></span>
</div>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th class="text-end">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($params['groupslist'] as $key):
    ?>
    <tr>
      <td><?php echo $key['name'] ?></td>
      <td class="text-end"><a href="editgroup/<?php echo $key['id'] ?>" class="btn btn-secondary btn-sml">Edit</a> <a href="" class="btn btn-danger btn-sml">Delete</a></td>
    </tr>
    <?php
    endforeach;
    ?>
  </tbody>
</table>
</div>