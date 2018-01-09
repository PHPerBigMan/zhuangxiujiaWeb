<div class="m-question-form">
    <div class="form-head clearfix">
        <div class="head-tit fl">
            <i class="icon-question"></i>
            装修问答
        </div>
        <div class="tips fr">已累计在线解决{{$resolved}}个问题</div>
    </div>

    <div class="form-body">
        <div class="form-left">
            <textarea placeholder="请在这里输入您的问题..." id="question-input"></textarea>
        </div>

        <div class="form-right">
            <input type="text" placeholder="姓名" id="question-name">
            <input type="number" placeholder="电话" id="question-phone">
            <div class="submit" id="question-submit">提交问题</div>
        </div>
    </div>

    <div class="tips">我们将在一个工作日内解决您的问题</div>
</div>

<script>
    $(function () {
        $submit = $('#question-submit')
        $name = $('#question-name')
        $phone = $('#question-phone')
        $input = $('#question-input')
        $submit.click(function () {
            var question = $input.val()
            var name = $name.val()
            var phone = $phone.val()

            if (!(question && name && phone)) {
                layer.msg('请完善信息', {icon: 2})
                return
            }

            sendAjax('post', '/question', {
                question: question,
                name: name,
                phone: phone,
            })
                .then(function (res) {
                    layer.msg(res.msg, {icon: 1})
                    location.href = '/question'
                })
        })
    })
</script>