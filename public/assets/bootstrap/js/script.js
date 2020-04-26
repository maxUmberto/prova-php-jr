(function(win, doc){
    'use strict';

    function confirmDel(event){
        event.preventDefault();

        // console.log('clicou');
        let token = doc.getElementsByName('_token')[0].value;
        // console.log(token);
        let ajax = new XMLHttpRequest();
        ajax.open('DELETE', event.target.href);
        ajax.setRequestHeader('X-CSRF-TOKEN', token);
        ajax.onload = function () {
            if (ajax.readyState === 4 && ajax.status === 200) {
                win.location.href = '/users';
            }
        };
        ajax.send(null);
    }

    if(doc.querySelector('#del-button')){
        let btn = doc.querySelectorAll('#del-button');
        for(let i = 0; i < btn.length; i++){
            // console.log(btn[i]);
            btn[i].addEventListener("click", confirmDel, false);
        }
    }
})(window, document)
