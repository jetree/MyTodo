(function(){
  'use strict';

  const email_area = document.getElementById('email')
  const password_area = document.getElementById('password')

  function $testlogin(user_name,email,password){
    let cmds = document.getElementById('login_' + user_name)
    console.log(cmds)

    cmds.addEventListener('click',function(e){
      e.preventDefault()
      email_area.value = email
      password_area.value = password

    })
  }

  $testlogin("test1","test1@test.com","testtest");
  $testlogin("test2","test2@test.com","testtest");

})();
