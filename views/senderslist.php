<?php /* views/home.php */ ?>
<div class="flex-shrink-0 p-3 bg-white">
<a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
<!-- <img src="images/logo.png" class="bi me-2" width="30" height="30" /> -->
<span class="fs-5 fw-semibold">Dashboard</span>
</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Descritpion</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($params['senderslist'] as $key):
    ?>
    <tr>
      <td><a href="editsender?id=<?php echo $key['id'] ?>"><?php echo $key['name'] ?></a></td>
      <td><?php echo $key['description'] ?></td>
      <td><a href="" class="btn btn-secondary btn-sm">Delete</a></td>
    </tr>
    <?php
    endforeach;
    ?>
  </tbody>
</table>