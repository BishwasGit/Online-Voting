const togglePassword = $('#togglePassword');
const password = $('#pass');


togglePassword.on('click',function(e){
    const type = password.attr('type') === 'password' ? 'text' : 'password';
    password.attr('type',type)
    togglePassword.toggleClass('fa-eye-slash')
})

$('#form1').submit(function(e) {
    const mob = $('#mob').val()
    const pass = $('#pass').val()
    if (grecaptcha.getResponse() == "" || !mob || !pass || mob=='' || pass==''|| mob.length!=10 ) {
        e.preventDefault()
        validateForm(mob,pass)

    }
})




function validateForm(mob,pass){
    const mobErr = $('.mob-error')
    const passErr = $('.pass-error')
    const captachaErr = $('.captacha-error')

    if(!mob || mob==''){
        mobErr.text('Please enter your mobile number')
    }
    
    
    if(pass.length<6){
        passErr.text('Password must be atleast length 6!')
    }
    

    if (mob.length !== 10 || !mob.startsWith("98")) {
        mobErr.text('Mobile number must start with "98" and be 10 digits long');
    }
s    


    // Yeslai pachi implement garna sakiyo password ko length chahiye
    // if(pass.length<6){
    //     passErr.text('Password must be length of 6')
    // }

    if(grecaptcha.getResponse() == ""){
        captachaErr.text('Please confirm that you are a human')
    }

}