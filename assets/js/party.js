$('#form3').submit(function(e) {
    const mob = $('#mob').val();
    const pass = $('#pass').val();
    const cpass = $('#cpass').val();
    const est = new Date($('#est').val()); // Assuming the est input field has the id "est"
  
    if (
      grecaptcha.getResponse() == "" ||
      !mob ||
      !pass ||
      mob == '' ||
      pass == '' ||
      cpass != pass ||
      mob.length != 10
    ) {
      e.preventDefault();
      validateForm(mob, pass, cpass, est);
    }
  });
  
  function validateForm(mob, pass, cpass, est) {
    const mobErr = $('.mob-error');
    const passErr = $('.pass-error');
    const captachaErr = $('.captacha-error');
    const estErr = $('.est-error');
  
    if (!mob || mob == '') {
      mobErr.text('Please enter your mobile number');
    }
  
    if (!pass || pass == '') {
      passErr.text('Please enter your password');
    }
  
    if (cpass != pass) {
      passErr.text('Password do not match!');
    }
  
    if (pass.length < 6) {
      passErr.text('Password must be at least 6 characters long');
    }
  
    if (mob.length != 10) {
      mobErr.text('Mobile number must be 10 digits');
    }
  
    if (grecaptcha.getResponse() == '') {
      captachaErr.text('Please confirm that you are a human');
    }
  
    const currentDate = new Date().toISOString().split('T')[0]; // Get the current date in ISO format (YYYY-MM-DD)
    
    if (est > currentDate) {
      estErr.text('Selected date cannot be a future date');
    }
  }
  