(function(){
  'use strict';

   const select_year = document.getElementById('select_year');
   const select_month = document.getElementById('select_month');
   const select_day = document.getElementById('select_day');
   let i;

  function $set_date(){
    // 年を生成(100年分)
    for(i = 1919; i <= 2020; i++){
      let op = document.createElement('option');
      op.value = i;
      op.text = i;
      select_year.appendChild(op);
    }
    // 月を生成(12)
    for(i = 1; i <= 12; i++){
      let op = document.createElement('option');
      op.value = i;
      op.text = i;
      select_month.appendChild(op);
    }
  }

  function $set_day(){
    let children = select_day.children
    while(children.length){
      children[0].remove()
    }
    // 日を生成(動的に変える)
    if(select_year.value !== '' &&  select_month.value !== ''){
      const last_day = new Date(select_year.value,select_month.value,0).getDate()
      console.log(last_day)

      for (i = 1; i <= last_day; i++) {
        let op = document.createElement('option');
        op.value = i;
        op.text = i;
        select_day.appendChild(op);
      }
    }
  }

  // 実行条件
  // load時、年月変更時
  $set_date();
  window.onload = function(){
    $set_day();
    select_year.addEventListener('change',$set_day)
    select_month.addEventListener('change',$set_day)

    select_year.value = select_year.getAttribute('data-old-value')
    select_month.value = select_month.getAttribute('data-old-value')
    select_day.value = select_day.getAttribute('data-old-value')
  }
})();
