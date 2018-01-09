let axios = window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Swiper = require('swiper/dist/js/swiper.min.js')

const PREFIX = ''

window.sendAjax = (method, path, data, prefix = true, loader = true) => {
    let url = PREFIX + path

    if (!prefix) {
        url = path
    }

    let config = {
        method,
        url,
    }

    if (method == 'get') {
        config.params = data
    } else {
        config.data = data
    }

    return new Promise((resolve, reject) => {
        let loading = null;
        if (loader) {
            loading = layer.load(0, {shade: [0.5, '#000']})
        }

        axios(config)
            .then(res => {
                console.log(res.data); // todo
                resolve(res.data)
                layer.close(loading)
            })
            .catch(err => {
                if (err.response.data.msg) {
                    layer.msg(err.response.data.msg, {icon: 2})
                }
                reject(err)
                layer.close(loading)
            })
    })
}