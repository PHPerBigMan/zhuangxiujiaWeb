<div class="m-service">
    {{--专享服务--}}
    @include('pc.components.SectionTit', ['main' => '专享服务', 'sub' => 'EXCLUSIVE SERVICE'])
    <div class="p-wrap">
        <div class="form-ctn">
            <div class="form-tab">
                <div class="tab-item active">
                    <i class="icon-pen"></i>
                    免费设计
                </div>
                <div class="tab-item">
                    <i class="icon-book"></i>
                    免费报价
                </div>
            </div>

            <div class="form-body">
                <div class="apply-btn" id="apply-submit">
                    <i class="icon-apply"></i>
                    <div>免费申请</div>
                </div>

                <div class="form-main">
                    <div class="form-row" id="apply-house">
                        <label class="row-label">房屋户型</label>
                        <select>
                            <option>一室</option>
                            <option>二室</option>
                            <option>三室</option>
                            <option>四室</option>
                            <option>五室</option>
                        </select>

                        <select>
                            <option>一厅</option>
                            <option>二厅</option>
                            <option>三厅</option>
                            <option>四厅</option>
                            <option>五厅</option>
                        </select>

                        <select>
                            <option>一卫</option>
                            <option>二卫</option>
                            <option>三卫</option>
                            <option>四卫</option>
                            <option>五卫</option>
                        </select>

                        <input type="text" placeholder="请输入面积" id="apply-area">
                    </div>

                    <div class="form-row" id="apply-address">
                        <label class="row-label">装修城市</label>
                        @include('pc.components.AddressSelect', ['wrap' => '.m-service'])

                        <input type="text" placeholder="请输入详细地址" style="width: 140px" id="apply-detail">
                    </div>

                    <div class="form-row">
                        <label class="row-label">您的称呼</label>
                        <input type="text" placeholder="请输入姓名" id="apply-name">
                        <input type="text" placeholder="请输入手机号码" id="apply-phone" style="width: 120px;">
                    </div>

                    <div class="form-row">
                        <i class="icon-horn"></i>
                        3套报价对比，获取最靠谱方案，拒绝超预算
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        var $tab = $('.m-service .tab-item')
        var $submit = $('#apply-submit')
        var $name = $('#apply-name')
        var $phone = $('#apply-phone')
        var $area = $('#apply-area')
        var $house = $('#apply-house')
        var $address = $('#apply-address')
        var applyType = 0
        $tab.click(function () {
            $tab.removeClass('active')
            $this = $(this)
            $this.addClass('active')
            applyType = $this.index()
        })

        $submit.click(function () {
            var house = '';
            var address = '';
            for (var i = 0; i < 3; i++) {
                house += $house.find('select').eq(i).val()
                address += $address.find('select').eq(i).find('option:selected').text()
            }
            var detail = $address.find('#apply-detail').val()

            if (!detail) {
                layer.msg('请填写详细地址', {icon: 2})
                return
            }

            address += detail

            sendAjax('post', '/free-apply', {
                type: applyType,
                name: $name.val(),
                phone: $phone.val(),
                acreage: $area.val(),
                houseType: house,
                address: address,
            })
                .then(function (res) {
                    layer.msg(res.msg, {icon: 1})
                    location.reload()
                })
        })
    })
</script>