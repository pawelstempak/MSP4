<?php /* views/editsender.php */ ?>
<div class="flex-shrink-0 p-3 bg-white">
<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
<span class="fs-6 fw-semibold">Senders <i class="bi bi-arrow-right-short"></i> <a class="link-secondary" href="/senderslist">List</a> <i class="bi bi-arrow-right-short"></i> <a class="link-secondary" href="/editsender">Edit sender</a></span>
</div>
<h4>Edit sender account</h4><br />
<form action="" method="post">
  <div class="mb-3">
    <label for="inputName" class="form-label">Name</label>
    <input type="text" name="name" value="<?php echo $params['sender']['name'] ?>" class="form-control" id="inputName" aria-describedby="nameHelp">
    <div id="nameHelp" class="form-text">Name of the sender which is display at "From" field</div>
  </div>    
  <div class="mb-3">
    <label for="InputEmail" class="form-label">Email address</label>
    <input type="email" name="email" value="<?php echo $params['sender']['email'] ?>" class="form-control" id="InputEmail" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Sender's email address</div>
  </div>
  <div class="mb-3">
    <label for="inputDescription" class="form-label">Description</label>
    <input type="text" value="<?php echo $params['sender']['description'] ?>" name="description" class="form-control" id="inputDescription">
  </div> 
  <div class="mb-3">
    <label for="inputSignature" class="form-label">Signature</label>
    <input type="text" name="signature" value="<?php echo $params['sender']['signature'] ?>" class="form-control" id="inputSignature" aria-describedby="signatureHelp">
    <div id="signatureHelp" class="form-text">Signature of yout email if it is attached</div>
  </div>  
  <div class="pb-3 pt-3">
  <hr> 
  </div>
  <div class="mb-3">
    <label for="inputHost" class="form-label">Host</label>
    <input type="text" name="host" value="<?php echo $params['sender']['host'] ?>" class="form-control" id="inputHost" aria-describedby="hostHelp">
    <div id="hostHelp" class="form-text">Host address of your SMTP server</div>
  </div>   
  <div class="mb-3">
    <label for="inputSMTP" class="form-label">Is SMTP Authorization</label>
    <input type="text" name="smtp_auth" value="<?php echo $params['sender']['smtp_auth'] ?>" class="form-control" id="inputSMTP" aria-describedby="smtpHelp">
    <div id="smtpHelp" class="form-text">Is your SMTP server require authorization?</div>
  </div>       
  <div class="mb-3">
    <label for="inputUsername" class="form-label">Username</label>
    <input type="text" name="username" value="<?php echo $params['sender']['username'] ?>" class="form-control" id="inputUsername" aria-describedby="usernameHelp">
    <div id="usernameHelp" class="form-text">Email's username credential</div>
  </div>      
  <div class="mb-3">
    <label for="inputPassword" class="form-label">Password</label>
    <input type="password" name="password" value="<?php echo $params['sender']['password'] ?>" class="form-control" id="inputPassword">
    <div id="passwordHelp" class="form-text">Email's password credential</div>
  </div>
  <div class="mb-3">
    <label for="inputPort" class="form-label">Port</label>
    <input type="text" name="port" value="<?php echo $params['sender']['port'] ?>" class="form-control" id="inputPort" aria-describedby="portHelp">
    <div id="portHelp" class="form-text">SMTP port number</div>
  </div>   
  <div class="mb-3">
    <label for="inputFromField" class="form-label">'From' field</label>
    <input type="text" name="from_field" value="<?php echo $params['sender']['from_field'] ?>" class="form-control" id="inputFromField">
  </div>
  <div class="mb-3">
    <label for="inputReplyto" class="form-label">'Reply to' field</label>
    <input type="text" name="replyto" value="<?php echo $params['sender']['replyto'] ?>" class="form-control" id="inputReplyto">
    <input type="hidden" name="id" class="form-control">
  </div>          
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <div class="d-flex justify-content-between"><button type="submit" class="btn btn-secondary">Submit</button> <a href="/senderslist" type="button" class="btn btn-light float-right">Cancel</a></div>
</form>
</div>