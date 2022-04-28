<?php /* views/newsender.php */ ?>
<div class="flex-shrink-0 p-3 bg-white">
<div class="d-flex align-items-center pb-3 mb-3 border-bottom">
<span class="fs-6 fw-semibold">Senders <i class="bi bi-arrow-right-short"></i> <a class="link-secondary" href="/newsender">New</a></span>
</div>
<h4>Create new sender account</h4><br />
<form action="" method="post">
  <div class="mb-3">
    <label for="inputName" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp">
    <div id="nameHelp" class="form-text">Name of the sender which is display at "From" field</div>
  </div>    
  <div class="mb-3">
    <label for="InputEmail" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Sender's email address</div>
  </div>
  <div class="mb-3">
    <label for="inputDescription" class="form-label">Description</label>
    <input type="text" name="description" class="form-control" id="inputDescription">
  </div> 
  <div class="mb-3">
    <label for="inputSignature" class="form-label">Signature</label>
    <input type="text" name="signature" class="form-control" id="inputSignature" aria-describedby="signatureHelp">
    <div id="signatureHelp" class="form-text">Signature of yout email if it is attached</div>
  </div>  
  <div class="pb-3 pt-3">
  <hr> 
  </div>
  <div class="mb-3">
    <label for="inputHost" class="form-label">Host</label>
    <input type="text" name="host" class="form-control" id="inputHost" aria-describedby="hostHelp">
    <div id="hostHelp" class="form-text">Host address of your SMTP server</div>
  </div>   
  <div class="mb-3">
    <label for="inputSMTP" class="form-label">Is SMTP Authorization</label>
    <input type="text" name="smtp_auth" class="form-control" id="inputSMTP" aria-describedby="smtpHelp">
    <div id="smtpHelp" class="form-text">Is your SMTP server require authorization?</div>
  </div>       
  <div class="mb-3">
    <label for="inputUsername" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="inputUsername" aria-describedby="usernameHelp">
    <div id="usernameHelp" class="form-text">Email's username credential</div>
  </div>      
  <div class="mb-3">
    <label for="inputPassword" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword">
    <div id="passwordHelp" class="form-text">Email's password credential</div>
  </div>
  <div class="mb-3">
    <label for="inputPort" class="form-label">Port</label>
    <input type="text" name="port" class="form-control" id="inputPort" aria-describedby="portHelp">
    <div id="portHelp" class="form-text">SMTP port number</div>
  </div>   
  <div class="mb-3">
    <label for="inputFromField" class="form-label">'From' field</label>
    <input type="text" name="from_field" class="form-control" id="inputFromField">
  </div>
  <div class="mb-3">
    <label for="inputReplyto" class="form-label">'Reply to' field</label>
    <input type="text" name="replyto" class="form-control" id="inputReplyto">
  </div>          
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-secondary">Submit</button>
</form>
</div>