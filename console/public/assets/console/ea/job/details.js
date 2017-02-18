/**
 * Created by ray on 17-2-16.
 */

$(function () {

    //var ue = UE.getEditor('editor');

    //$('#fuelux-wizard-container .steps').()
    $('.alert').hide();

    $('.btn-next').click(function () {
        var currentPanel = $('.step-content').find('.active');
        var current = $('#fuelux-wizard-container .steps').find('.active');
        var next = current.next();

        if(next.length < 1){
            return;
        }

        if(next.attr('data-step') >= $('#fuelux-wizard-container .steps li').length){

            $('.btn-next').attr('disabled', 'disabled');

            if($('#txtBeginSalary').val() == '' || $('#txtEndSalary').val() == ''){
                return;
            }

            var forms = '';
            $('form').each(function () {
                forms += $(this).serialize() + '&';
            });
            var data = forms.length > 1 ? forms.substr(0, forms.length - 1) : forms;

            var remote = _api_host + '/ea/job.json?access_token=' + _access_token;
            remote = window.btoa(remote);

            $.ajax({
                url: '/crossdomainproxy?remote=' + remote,
                type: 'post',
                data: data,
                dataType: 'json',
                success:function (data) {

                    if(data.status == 'err'){
                        return
                    }

                    $('input[name=id]:checked').each(function () {
                        $(this).parents('tr').remove();
                    });

                    if($('tbody tr').length < 1){
                        $('a[role=btnPrevious]').trigger('click');
                    }
                }
            })

        }else{
            $('.btn-prev').removeAttr('disabled');
        }
        current.removeClass('active');
        current.next().addClass('active');
        currentPanel.removeClass('active');
        currentPanel.next().addClass('active');

    });

    $('.btn-prev').click(function () {
        var currentPanel = $('.step-content').find('.active');
        var current = $('#fuelux-wizard-container .steps').find('.active');
        var next = current.prev();
        if(next.length < 1){
            return;
        }

        if(next.attr('data-step') <= 1){
            $('.btn-prev').attr('disabled', 'disabled');
        }else{
            $('.btn-next').removeAttr('disabled');
        }
        current.removeClass('active');
        current.prev().addClass('active');
        currentPanel.removeClass('active');
        currentPanel.prev().addClass('active');

    });

 });



function valid_data(element) {
    //var form = element.find('form');
    //form.submit();
    return true;
}