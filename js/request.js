 

    console.log('goldcoin=>', $('#intro_name').val() )
   

    const validationMessages = {
        usernameEmpty: '<span style="font-size:12px;">* Enter your username</span>',
        passwordEmpty: '<span style="font-size:12px;">* Enter your password</span>',
        retypePasswordEmpty: '<span style="font-size:12px;">* Enter your retype password</span>',
        firstNameEmpty: '<span style="font-size:12px;">* Enter your first name</span>',
        lastNameEmpty: '<span style="font-size:12px;">* Enter your username</span>',
        emailEmpty: '<span style="font-size:12px;">* Enter your Email</span>',
        refCodeEmpty: '<span style="font-size:12px;">* Enter your Referral Code</span>',
        walletEmpty: '<span style="font-size:12px;">* Enter your Wallet address</span>',
        passwordLenghtCheck: '<span style="font-size:12px;">* Password length minimum 6</span>',
        passwordRetypePasswordMismatch: '<span style="font-size:12px;">* Enter your retype and password not matched</span>',
        questionEmpty: '<span style="font-size:12px;">* Select your question</span>',
        answerEmpty: '<span style="font-size:12px;">* Enter your answer</span>'
    };
    
    
    checkIntroDucer = (isShow)  => {        
      $('#exampleModalReg').modal(isShow);          
    };

    // registration modal open for referal Link and password reset modal open 

    if ($('#intro_name').val() === '') {
      checkIntroDucer('hide');
    }else {
      checkIntroDucer('show');
    }
    


 


    //login form validation

    $("#login").submit((event) => { 

      console.log('logf0rm');
      $(".msg").html('');
      const username = $('#txtUsername').val();
      const pass     = $('#txtPassword').val();	  
      if (username === "") {
        $(".msg").html(validationMessages.usernameEmpty);
        $("#txtUsername").focus();
        return false;
      } 
      else if (pass === "") {
        $(".msg").html(validationMessages.passwordEmpty);
        $("#txtPassword").focus();
        return false;
      }else {
        $.ajax({
          type:'POST',
          url: 'login_check.php',
          data: $('#login').serialize(),
          success: (response) => {
            const responseJSON = JSON.parse(response);  
            console.log('response=>', responseJSON);
            if (responseJSON.status === 1001) {
              modalDialogSwitching('Log', 'show'); 
              displayNotificationMessage('success_message', '');
              $(".success_message").css('display','none');
              displayNotificationMessage('error_message', responseJSON.msg);
            } else {
              modalDialogSwitching('Log', 'hide');  
              displayNotificationMessage('success_message', '');
              $(".success_message").css('display','none');
              displayNotificationMessage('error_message', '');
              $(".error_message").css('display','none');
              window.location.href = ''+responseJSON.url;
            }
          }
        });
      }
      return false;
    });

    //forget password check

    $("#forPass").submit((event) => { 
      console.log('logf0rm');
      $(".msgforpass").html('');
      const email = $('#email').val();
      if (email === "") {
        $(".msgforpass").html(validationMessages.emailEmpty);
        $("#email").focus();
        return false;
      }else {
        $.ajax({
          type:'POST',
          url: 'password_forgot.php',
          data: $('#forPass').serialize(),
          success: (response) => {
            const responseJSON = JSON.parse(response);  
            console.log('response=>', responseJSON);
            console.log('response=>', responseJSON.status);
            if (responseJSON.status === 1002) {
              modalDialogSwitching('ForgetPass', 'show');
              $("#email").val('');
              $('#forgotPassButton').prop('disabled', true);

              displayNotificationMessage('error_message_forPass', '');
              $(".error_message_forPass").css('display','none');
              displayNotificationMessage('success_message_forPass', responseJSON.msg);
            } 
            else {
              displayNotificationMessage('success_message_forPass', '');
              $(".success_message_forPass").css('display','none');
              modalDialogSwitching('ForgetPass', 'show');
              displayNotificationMessage('error_message_forPass', responseJSON.msg);
            }
          }
        });
      }
      return false;
    });

    //reset password check

    $("#passReset").submit((event) => { 

      console.log('logf0rm');
      $(".msgpassreset").html('');
      const password = $('#new_password').val();
      const passwordConfirm = $('#new_confirm_password').val();
      if (password === "") {
        $(".msgpassreset").html(validationMessages.emailEmpty);
        $("#new_password").focus();
        return false;
      }
      else if (passwordConfirm === "") {
        $(".msgpassreset").html(validationMessages.emailEmpty);
        $("#new_confirm_password").focus();
        return false;
      }
      else if (password.length < 6) {
        $(".msgpassreset").html(validationMessages.passwordLenghtCheck);
        $("#new_password").focus();
        return false;
      }
      else if (password !== passwordConfirm) {
        $(".msgpassreset").html(validationMessages.passwordRetypePasswordMismatch);
        $("#new_confirm_password").focus();
        return false; 
      }else {
        $.ajax({
          type:'POST',
          url: 'reset_password_check.php',
          data: $('#passReset').serialize(),
          success: (response) => {
            const responseJSON = JSON.parse(response);  
            console.log('response=>', responseJSON);
            console.log('response=>', responseJSON.status);
            if (responseJSON.status === 1002) {
              $('#new_password').val('');
              $('#new_confirm_password').val('');
              
              $('#resPassButton').prop('disabled', true);
              modalDialogSwitching('Login', 'show');
              modalDialogSwitching('PassReset', 'hide');
              displayNotificationMessage('success_message', responseJSON.msg);
            } 
            else {
              // modalDialogSwitching('ForgetPass', 'show');
              $('#new_password').val('');
              $('#new_confirm_password').val('');
              modalDialogSwitching('Login', 'hide');
              modalDialogSwitching('PassReset', 'show');
              displayNotificationMessage('error_message_resPass', responseJSON.msg);
            }
          }
        });
      }
      return false;
    });
    
    //reg form validation
    $("#regform").submit((event) => { 
      console.log('regf0rm');
      $(".msgreg").html('');
      const firstName = $('#first_name').val();
      const userName = $('#username').val();
      const memberEmail = $('#member_email').val();
      const introName = $('#intro_name').val();
      const bitCoin = $('#bitcoin').val();
      const password = $('#password').val();
      const rePassword = $('#re_password').val();
      const question = $('#select2').val();
      const answer = $('#answer').val();
      
      if (firstName === "") {
        $(".msgreg").html(validationMessages.firstNameEmpty);
        $("#first_name").focus();
        return false;
      }
      else if (userName === "") {
        $(".msgreg").html(validationMessages.usernameEmpty);      
        $("#username").focus();
        return false;
      }
      else if (memberEmail === "") {
        $(".msgreg").html(validationMessages.emailEmpty);       
        $("#member_email").focus();
        return false;
      }
      else if (introName === "") {
        $(".msgreg").html(validationMessages.refCodeEmpty);        
        $("#intro_name").focus();
        return false;
      }
      else if (bitCoin === "") {
        $(".msgreg").html(validationMessages.walletEmpty);        
        $("#bitcoin").focus();
        return false;
      }
      else if (password === "") {
        $(".msgreg").html(validationMessages.passwordEmpty);
        $("#password").focus();
        return false;
      }
      else if (password.length < 6) {
        $(".msgreg").html(validationMessages.passwordLenghtCheck);
        $("#password").focus();
        return false;
      }
      else if (rePassword === "") {
        $(".msgreg").html(validationMessages.retypePasswordEmpty);
        $("#re_passwords").focus();
        return false;
      }
      else if (password !== rePassword) {
       $(".msgreg").html(validationMessages.passwordRetypePasswordMismatch);
        $("#re_passwords").focus();
        return false; 
      }
      else if (question === "") {
        $(".msgreg").html(validationMessages.questionEmpty);
        $("#select2").focus();
        return false;
      }
      else if (answer === "") {
        $(".msgreg").html(validationMessages.answerEmpty);
        $("#answer").focus();
        return false;
      } else {          
            $.ajax({
              type:'POST',
              url: 'reg_check.php',
              data: $('#regform').serialize(),
              success: (response) => {
                const responseJSON = JSON.parse(response);  
                console.log('response=>', responseJSON);
                console.log('response=>', responseJSON.status);
                if (responseJSON.status === 1001) {
                    modalDialogSwitching('Reg', 'show');
                    modalDialogSwitching('Login', 'hide');
                    displayNotificationMessage('error_message_reg', responseJSON.msg);
                } 
                // if (responseJSON.status === 1002)
                else {
                    // success
                    displayNotificationMessage('success_message', responseJSON.msg);
                    modalDialogSwitching('Reg', 'hide');
                    modalDialogSwitching('Login', 'show');
                }
              }
            });                    
      }
      return false;
    });
    
     //contact Us send

    $("#contact").submit((event) => { 
      console.log('logf0rm');
      $(".msgcontact").html('');
      const name = $('#name').val();
      const email = $('#emailcontact').val();
      const description = $('#message').val();
      if (name === "") {
        $(".msgcontact").html('<span style="font-size:12px;">* Enter your name</span>');
        $("#name").focus();
        return false;
      }
      else if (email === "") {
        $(".msgcontact").html(validationMessages.emailEmpty);
        $("#emailcontact").focus();
        return false;
      }
      else if (description === "") {
        $(".msgcontact").html('<span style="font-size:12px;">* Enter your message<span>');
        $("#message").focus();
        return false;
      }
      else {
        $.ajax({
          type:'POST',
          url: 'contact_mail.php',
          data: $('#contact').serialize(),
          success: (response) => {
            const responseJSON = JSON.parse(response);  
            console.log('response=>', responseJSON);
            console.log('response=>', responseJSON.status);
            if (responseJSON.status === 1001) {
              $("#name").val('');
              $("#emailcontact").val('');
              $("#message").val('');
              
              $('#buttonContactUs').prop('disabled', true);
              $('.success_message').html('');
              // $("."+ className).css('display','block');
              // $("."+ className).html(message);
              // $('.success_message').css('display','block');
              // $('.success_message').html(responseJSON.msgs);
              displayNotificationMessage('success_message_contact', responseJSON.msgs);
            }
          }
        });
      }
      return false;
    });

    modalDialogSwitching = (isModal, isShow) => {
       console.log('modalDialogSwitching=>', isModal, isShow);
       $('#exampleModal'+ isModal).modal(isShow);
    };


    displayNotificationMessage = (className, message) => {
      console.log('modalDialogSwitching=>', className, message);
      $("."+ className).css('display','block');
      $("."+ className).html(message);
    };

    // subscribe empty
    $('button').click(function(){
      location.reload();
      $('input[type="text"]').val('');
    });

    //FAQ on click extend
    $('.hide_div').hide();
    function faqExpand(){
      $('.hide_div').show();
      $('.hide_seemore').hide();
    }

    function closeModal(){
      $.ajax({
        url: 'password-reset-modal-close.php',
        method: 'POST',
        data: '1=1',
        success: (response) => {
          console.log('response=>', response);
          // if true show modal
          const responseJSON = JSON.parse(response);  
          if (responseJSON.status === true) {
            // modalDialogSwitching('PassReset', 'hide');
            modalDialogSwitching('PassReset', 'hide');
          }else{
            modalDialogSwitching('PassReset', 'show');
          }
        }
      });
    }

    // password reset modal call
    loadPasswordResetModal = () => {
      $.ajax({
        url: 'password-reset-status-check.php',
        method: 'POST',
        data: '1=1',
        success: (response) => {
          console.log('response=>', response);
          // if true show modal
          const responseJSON = JSON.parse(response);  
          if (responseJSON.status === true && responseJSON.dialog === 'password_reset') {
            console.log(responseJSON.dialog);
            // modalDialogSwitching('PassReset', 'hide');
            modalDialogSwitching('PassReset', 'show');
            modalDialogSwitching('Reg', 'hide');
          }
          else if(responseJSON.status === true && responseJSON.dialog === 'introReg'){
            modalDialogSwitching('Reg', 'show');
            modalDialogSwitching('PassReset', 'hide');
          }
          else{
            modalDialogSwitching('Reg', 'hide');
            modalDialogSwitching('PassReset', 'hide');
            checkIntroDucer('hide');
          }
        }
      });
    }

    loadPasswordResetModal();
    

