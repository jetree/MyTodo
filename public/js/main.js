(function(){
  'use strict';

  // form・memberリスト　モーダル出現処理
  function $modal(){
    const todo_add_btn = document.getElementById('todo_add_btn');
    const add_trigger= document.getElementById('add_trigger');
    const add_textarea= document.getElementById('add_textarea');

    const member_btn= document.getElementById('member_btn');
    const member_trigger= document.getElementById('member_trigger');

    const edit_trigger =document.getElementById('edit_trigger');

    const mask = document.getElementById('mask');

    todo_add_btn.addEventListener('click',function(){
      add_trigger.checked = true;
      mask.classList.remove('hidden');
      add_textarea.focus();
    })

    member_btn.addEventListener('click',function(){
      member_trigger.checked = true;
      mask.classList.remove('hidden');
    })
    mask.addEventListener('click',function(){
      mask.classList.add('hidden');
      add_trigger.checked = false;
      member_trigger.checked = false;
      edit_trigger.checked = false;
    })
  }

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

    // console.log(cmds)
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
        document.getElementById('mask').classList.remove('hidden');
        console.log(document.getElementById('mask').classList);
        textarea.focus();
        Edit.action = "/posts/" + $id

      });
    };
  }

  // form送信エラー時form再出現（未完成）
  function $todo_add_area(){
    const Errors = document.getElementById('errors')
    if(Errors !== null){
      document.getElementById('add_trigger').checked = true;
      document.getElementById('mask').classList.remove('hidden');
    }
  }

// friendlistの表示非表示
  function $list_open(element,element_open){
    element_open.addEventListener('click',function(){
      // listの高さを０にする
      // overflow:hidden
      element.classList.toggle('close')
      // マークを上下反転する
      element_open.classList.toggle('icon-reverse')
    })
  }

  const user_list = document.getElementById('user_list')
  const user_list_open = document.getElementById('user_list_open')
  const follower_list = document.getElementById('follower_list')
  const follower_list_open = document.getElementById('follower_list_open')
  const follow_list = document.getElementById('follow_list')
  const follow_list_open = document.getElementById('follow_list_open')
  const friend_list = document.getElementById('friend_list')
  const friend_list_open = document.getElementById('friend_list_open')

  $modal();
  $delete();
  $edit();
  $todo_add_area();
  $list_open(user_list,user_list_open)
  $list_open(follower_list,follower_list_open)
  $list_open(follow_list,follow_list_open)
  $list_open(friend_list,friend_list_open)


})();
