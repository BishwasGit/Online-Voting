$('#form4').submit(function(e) {
    //const mob = $('#mob').val()
    const pass = $('#pass').val()
    //const add = $('#add').val()
    //const age = $('#age').val()
    if (grecaptcha.getResponse() == "" || !pass || pass=='') {
        e.preventDefault()
        validateForm(pass)

    }
})



function validateForm(pass){
    //const mobErr = $('.mob-error')
    const passErr = $('.pass-error')
    //const addErr = $('.add-error')
    //const ageErr = $('.age-error')
    const captachaErr = $('.captacha-error')

   
    
    if(!pass || pass==''){
        passErr.text('Please enter your password')
    }

    if(pass.length<6){
        passErr.text('Password must be atleast length 6!')
    }

   

    // Yeslai pachi implement garna sakiyo password ko length chahiye
    // if(pass.length<6){
    //     passErr.text('Password must be length of 6')
    // }

    if(grecaptcha.getResponse() == ""){
        captachaErr.text('Please confirm that you are a human')
    }

}