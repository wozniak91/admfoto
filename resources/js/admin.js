import suneditor from 'suneditor'
import plugins from 'suneditor/src/plugins'
// import $ from 'jquery';

// window.$ = window.jQuery = $;
window.axios = require('axios');
require('bootstrap');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

let textarea = document.querySelector('#textarea');
let submit = document.querySelector('#submit');
let editor = false;

if(textarea != null) {
    editor = suneditor.create('textarea', {
        stickyToolbar: false,
        plugins: plugins,
        width: '100%',
        buttonList: [
        ['undo', 'redo'],
        ['fontSize', 'formatBlock'],
        ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
        ['removeFormat'],
            '/', // Line break
            ['fontColor', 'hiliteColor'],
            ['indent', 'outdent'],
            ['align', 'horizontalRule', 'list', 'table'],
            ['link', 'image', 'video'],
            ['fullScreen', 'showBlocks', 'codeView'],
            ['preview', 'print']
            ]
        });
}

if(submit != null) {
    submit.addEventListener('click', function() {
        editor.save();
    });
}

const navBg = document.createElement('div');
navBg.classList.add('nav-bg');
let nav = false;

document.querySelector('.nav-button').addEventListener('click', function() {

    document.querySelector('.nav').classList.toggle('active');
    nav = nav ? false : true;
    this.classList.toggle('active');
    if(nav) {
        document.body.appendChild(navBg);
        setTimeout(() => {
            navBg.classList.add('active')
        }, 50)

    } else {
        navBg.classList.remove('active');
        setTimeout(() => {
            document.body.removeChild(navBg);
        }, 50)
    }

});

navBg.addEventListener('click', function() {
    document.querySelector('.nav').classList.remove('active');
    document.querySelector('.nav-button').classList.remove('active');
    navBg.classList.remove('active');
    setTimeout(() => {
        document.body.removeChild(navBg);
    }, 50)
    nav = false;
});

let sendNewsletter = document.querySelector('.form-newsletter');

if(sendNewsletter != null) {
    sendNewsletter.addEventListener('submit', function(e) {
        
        e.preventDefault();

        editor.save();

        let subscribes = document.querySelector('#subscribes');
        let subscribesData = [];
        let contentData = editor.getContents();
        for (var i = 0; i < subscribes.options.length; i++) {
        
            if(subscribes.options[i].selected == true ){
              subscribesData.push(subscribes.options[i].value);
            }

        }
        

        let dataForm = {
            subscribes: subscribesData,
            content: contentData
        }

        axios.post(window.location.href, dataForm)
            .then(resp => resp.data)
            .then(resp => {
                console.log(resp);
            });


    });
}