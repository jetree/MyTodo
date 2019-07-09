(function(){
  'use strict';

  // 削除機能
  function $delete(){
    let cmds = document.getElementsByClassName('del');
    let i;

    for (i = 0; i < cmds.length; i++){
      cmds[i].addEventListener('click',function(e){
        e.preventDefault();
        if (confirm('削除しますか？')){
          let Del = document.getElementById('form_' + this.dataset.id)
          Del.submit();
        };
      });
    }
  }

  // 編集機能
  function $edit(){
    let cmds = document.getElementsByClassName('edit');
    const btn = document.getElementById('edit_btn');
    const textarea = document.getElementById('edit_textarea');

    console.log(cmds)
    let i;

    for (i=0; i < cmds.length; i++){
      cmds[i].addEventListener('click',function(e){
        e.preventDefault();
        let $id = this.dataset.id
        console.log($id);
        let Edit = document.getElementById('form_edit');
        let Text = document.getElementById('text_' + this.dataset.id).textContent;
        console.log(Text);
        textarea.value = Text;
        document.getElementById('edit_trigger').checked = true;
        Edit.action = "/posts/" + $id

      });
    };
  }

  function $todo_add_area(){
    const Errors = document.getElementById('errors')
    if(Errors !== null){
      document.getElementById('add_trigger').checked = true;
    }
  }


  $delete();
  $edit();
  $todo_add_area();

})();
