(function(){
  'use strict';

  let cmds = document.getElementsByClassName('del');
  let i;

  for (i = 0; i < cmds.length; i++){
    console.log(i);
    cmds[i].addEventListener('click',function(e){
      e.preventDefault();
      console.log(this.dataset.id);
      console.log('form_' +this.dataset.id);
      if (confirm('削除しますか？')){
        let Del = document.getElementById('form_' + this.dataset.id)
        Del.submit();
      };
    });
  }

})();
