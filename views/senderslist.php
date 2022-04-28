<?php /* views/senderslist.php */ ?>
<div class="flex-shrink-0 p-3 bg-white">
<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
<span class="fs-5 fw-semibold">Senders <i class="bi bi-arrow-right-short"></i> <a class="link-secondary" href="/senderslist">List</a></span>
</div>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Description</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($params['senderslist'] as $key):
    ?>
    <tr>
      <td><?php echo $key['name'] ?></td>
      <td><?php echo $key['email'] ?></td>
      <td><?php echo $key['description'] ?></td>
      <td><a href="/editsender/<?php echo $key['id'] ?>" class="btn btn-secondary btn-sml">Edit</a> <a href="" class="btn btn-danger btn-sml">Delete</a></td>
    </tr>
    <?php
    endforeach;
    ?>
  </tbody>
</table>
</div>