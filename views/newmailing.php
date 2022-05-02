<?php /* views/newsender.php */ ?>
<div class="flex-shrink-0 p-3 bg-white">
<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
<span class="fs-6 fw-semibold">Groups <i class="bi bi-arrow-right-short"></i> <a class="link-secondary" href="newgroup">Import</a></span>
</div>
<h4>Create new mailing</h4><br />
<form action="" method="post">
  <div class="mb-3">
      <label for="selectSenderField" class="form-label">Chose sender account</label>
      <select class="form-select" name="sender" aria-label="Default select example" id="selectSenderField">
      <option selected>Select sender</option>
      <?php foreach($params['senderslist'] as $key): 
      ?>
      <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
      <?php 
            endforeach;
      ?>
      </select>      
  </div>
  <div class="mb-3">
      <label for="selectReciepientsField" class="form-label">Chose mailing reciepients</label>
      <select class="form-select" name="reciepients" aria-label="Default select example" id="selectReciepientsField">
      <option selected>Select reciepients group</option>
      <?php foreach($params['groupslist'] as $key): 
      ?>
      <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
      <?php 
            endforeach;
      ?>
      </select>      
  </div>   
  <div class="mb-3">
    <label for="InputSubject" class="form-label">Subject</label>
    <input type="text" name="subject" class="form-control" id="InputSubject">
  </div>     
  <div class="mb-3">
    <label for="inputEmailContent" class="form-label">Email content</label>
    <textarea name="emailcontent" class="form-control" id="inputEmailContent" rows="10"></textarea><br />
  <div class="d-flex justify-content-between"><button type="submit" class="btn btn-secondary">Submit</button> <a href="grpupslist" type="button" class="btn btn-light float-right">Cancel</a></div>
</form>
</div>