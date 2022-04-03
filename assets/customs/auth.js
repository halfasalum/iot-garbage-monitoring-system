(function(){

    /*
    * Company registration script by (AHBABRASUL)
    */

    $(document).on('change','#company',function (){
        $('#company_feedback').html("");
        $('#company').LoadingOverlay('show',{
            image       : "",
            fontawesome : "fa fa-circle-o-notch fa-spin"
        });
        $.ajax({
            url : base_url+'Auth/validateCompany',
            type: "POST",
            data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                if (data.feedback != null){
                    $('#submit').attr('disabled',true);
                    $('#company_feedback').html(data.feedback);
                    $('._feedback').fadeIn(5000);
                }else{
                    $('#submit').removeAttr('disabled');
                }
                $('#company').LoadingOverlay("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('An error occur while validating company name');
                $('#company').LoadingOverlay("hide");
            }
        });
    })

    $(document).on('change','#email',function (){
        $('#email_feedback').html("");
        $('#email').LoadingOverlay('show',{
            image       : "",
            fontawesome : "fa fa-circle-o-notch fa-spin"
        });
        $.ajax({
            url : base_url+'Auth/validateEmail',
            type: "POST",
            data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                if (data.feedback != null){
                    $('#email_feedback').html(data.feedback);
                    $('._feedback').fadeIn(5000);
                    $('#submit').attr('disabled',true);
                }else{
                    $('#submit').removeAttr('disabled');
                }
                $('#email').LoadingOverlay("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('An error occur while validating company email');
                $('#email').LoadingOverlay("hide");
            }
        });
    })

    $(document).on('change','#a_email',function (){
        $('#a_email_feedback').html("");
        $('#a_email').LoadingOverlay('show',{
            image       : "",
            fontawesome : "fa fa-circle-o-notch fa-spin"
        });
        $.ajax({
            url : base_url+'Auth/validateAccountEmail',
            type: "POST",
            data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                if (data.feedback != null){
                    $('#a_email_feedback').html(data.feedback);
                    $('._feedback').fadeIn(5000);
                    $('#submit').attr('disabled',true);
                }else{
                    $('#submit').removeAttr('disabled');
                }
                $('#a_email').LoadingOverlay("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('An error occur while validating company email');
                $('#a_email').LoadingOverlay("hide");
            }
        });
    })

    $(document).on('change','#a_username',function (){
        $('#a_username_feedback').html("");
        $('#a_username').LoadingOverlay('show',{
            image       : "",
            fontawesome : "fa fa-circle-o-notch fa-spin"
        });
        $.ajax({
            url : base_url+'Auth/validateAccountUsername',
            type: "POST",
            data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                if (data.feedback != null){
                    $('#a_username_feedback').html(data.feedback);
                    $('._feedback').fadeIn(5000);
                    $('#submit').attr('disabled',true);
                }else{
                    $('#submit').removeAttr('disabled');
                }
                $('#a_username').LoadingOverlay("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('An error occur while validating company email');
                $('#a_username').LoadingOverlay("hide");
            }
        });
    })

    $(document).on('change','#package',function (){
        $('#package_feedback').html("");
        $('#selected_package').html("");
        $('#package').LoadingOverlay('show',{
            image       : "",
            fontawesome : "fa fa-circle-o-notch fa-spin"
        });
        $.ajax({
            url : base_url+'Auth/packageSelection',
            type: "POST",
            data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                if (data.feedback != null){
                    $('#package_feedback').html(data.feedback);
                    $('._feedback').fadeIn(5000);
                    $('#submit').attr('disabled',true);
                }else{
                    $('#selected_package').html(data.package);
                    $('#submit').removeAttr('disabled');
                }
                $('#package').LoadingOverlay("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('An error occur while validating company email');
                $('#a_username').LoadingOverlay("hide");
            }
        });
    })

    /*
    * Ends here
    */
})();