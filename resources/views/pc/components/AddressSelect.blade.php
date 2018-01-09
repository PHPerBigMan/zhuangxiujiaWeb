<span class="m-address-select">
    <select id="province" disabled="disabled">
        <option >浙江省</option>
    </select>

    <select id="city"  >
        <option>杭州市</option>
    </select>

    <select id="dist">
        <option>市辖区</option>
    </select>
</span>

<script>
    @php($wrap = isset($wrap) ? $wrap : '.m-address-select')

    $(function () {
        var $wrap = $('{{$wrap}}');
        var $province = $wrap.find('#province')
        var $city = $wrap.find('#city')
        var $dist = $wrap.find('#dist')
        var one = 10;
        var two = 0;
        var three = 0;
        var addressData = window.addressData;

        $wrap.on('mouseenter', function () {
            if (!addressData || addressData.length == 0) {
                sendAjax('get', '/address-data', null, true, false)
                    .then(function (res) {
                        addressData = window.addressData = res.data
                        init()
                    })
            }
        })


        function fillHtml($dom, type) {
            var key
            var html = ''
            var data = []

            try {
                if (type == 1) {
                    key = 'province';
                    data = addressData
                } else if (type == 2) {
                    key = 'city'
                    data = addressData[one].child
                } else if (type == 3) {
                    key = 'area'
                    data = addressData[one].child[two].child
                }
            } catch (err) {
                data = null
            }

            if (data && data instanceof Array && data.length) {
                if (type == 1) {
                    html = '<option value="' + 1 + '">' +' 浙江省' + '</option>'
                } else {
                    data.forEach(function (el, k) {
                        html += '<option value="' + k + '">' + el[key] + '</option>'
                    })
                }

            }

            $dom.html(html)
        }

        function init() {
            fillHtml($province, 1)
            fillHtml($city, 2)
            fillHtml($dist, 3)

            $province.change(function () {
                one = $province.val()
                two = 0
                three = 0
                fillHtml($city, 2)
                fillHtml($dist, 3)
                console.log(one, two, three);
            })

            $city.change(function () {
                two = $city.val()
                three = 0
                fillHtml($dist, 3)
                console.log(one, two, three);
            })

            $dist.change(function () {
                three = $dist.val()
            })
        }
    })

</script>