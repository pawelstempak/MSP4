<?php /* views/newsender.php */ ?>
<div class="flex-shrink-0 p-3 bg-white">
<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
<span class="fs-6 fw-semibold">Groups <i class="bi bi-arrow-right-short"></i> <a class="link-secondary" href="newgroup">Import</a></span>
</div>
<h4>Create new sender account</h4><br />
<form action="" method="post">
  <div class="mb-3">
    <label for="inputName" class="form-label">Group name</label>
    <input type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp">
    <div id="nameHelp" class="form-text"></div>
  </div>    
  <div class="mb-3">
    <label for="inputImportfield" class="form-label">Import field</label>
    <textarea name="importfield" class="form-control" id="inputImportfield"rows="10"></textarea><br />
  <div class="d-flex justify-content-between"><button type="submit" class="btn btn-secondary">Submit</button> <a href="grpupslist" type="button" class="btn btn-light float-right">Cancel</a></div>
</form>
</div>