(function(){
  'use strict';

  function $testlogin(user_name){
    let cmds = document.getElementById('login_' + user_name)
    console.log(cmds)

    cmds.addEventListener('click',function(e){
      e.preventDefault()

    })
  }

  $testlogin("test1");
  $testlogin("test2");

})();
