<!doctype html>
<html class="fixed">
<?php include $header; ?>
<body>
<section class="body">
    <?php include $top; ?>
    <div class="inner-wrapper">

        <?php include $asideLeft; ?>

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Blank Page</h2>

                <div class="right-wrapper text-end">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.html">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>

                        <li><span>Pages</span></li>

                        <li><span>Blank Page</span></li>

                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <?php //include $page; ?>
            <!-- end: page -->
        </section>
    </div>
    <?php include $asideRight; ?>
</section>



<?php include $footer; ?>

<script>
	jQuery(function(){ Codebase.helpers(['slimscroll','table-tools','ckeditor', 'maxlength', 'select2', 'tags-inputs','notify']); });
    //jQuery("#modal-onboarding").modal("show");
	$(document).on('click','#actionModal',function (e) {
		Codebase.layout('header_loader_on')
		//$('.az-content-body').LoadingOverlay("show");
		e.preventDefault();
		let c = ($(this).attr('c'));
		let f = ($(this).attr('f'));
		let d = ($(this).attr('d'));
		let o = ($(this).attr('o'));
		$.ajax({
			type : 'GET',
			url : '<?php echo site_url(); ?>'+ c +'/' + f + '/' + d + '/' + o,
			success:function (data) {
				//$('.az-content-body').LoadingOverlay("hide");
				$('#contents').html(data);
				$('.actionModal').modal("show");
				Codebase.layout('header_loader_off')
			}
		});
	});

	$(document).on('click','#saveModal',function (e) {
		Codebase.layout('header_loader_on')
		e.preventDefault();
		let c = ($(this).attr('c'));
		let f = ($(this).attr('f'));
		let d = ($(this).attr('d'));
		let o = ($(this).attr('o'));
		var form = $('form').get(0);
		var formData  = new FormData(form);
		$.ajax({
			type : 'POST',
			data : $('form').serialize(),
			//data : formData,
			//processData: false,
			//contentType: false,
			url : '<?php echo site_url(); ?>'+ c +'/' + f + '/' + d + '/'+ o,
			success:function (data) {
				$('#contents').html(data);
				Codebase.layout('header_loader_off')
			}
		});
	});

	$(document).on('change','#returnType',function (e){
        e.preventDefault();
        let returnType      = $(this).val();
        $('[name="startingDate"]').val(null);
        $('[name="endingDate"]').val(null);
        $('#schedule').html(null);
        if (returnType == 1){
            $('#startingDate').removeAttr('readonly');
            $('#loanPeriod').attr('readonly',true);
            $('[name="loanPeriod"]').val(0);
            Codebase.layout('header_loader_on');
            $.ajax({
                url : "<?php echo site_url('Base/loanInterest') ?>",
                type: "POST",
                data: $('form').serialize(),
                dataType : "JSON",
                success: function(data)
                {
                    let html    = '';
                    $('#error').html(html);
                    if (data.error !== null){
                        html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                        $('#error').html(html);
                        Codebase.layout('header_loader_off')
                    }
                    else{
                        $('[name="loanInterest"]').val(data.interest);
                        $('[name="totalLoan"]').val(data.total);
                        $('[name="return"]').val(data.returns);
                        Codebase.layout('header_loader_off')
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                    Codebase.layout('header_loader_off')
                }
            });
        }else {
            $('#loanPeriod').removeAttr('readonly');
            $('#startingDate').removeAttr('readonly');
            $('#loanPeriod').attr('required',true);
            Codebase.layout('header_loader_on');
            $.ajax({
                url : "<?php echo site_url('Base/loanInterest') ?>",
                type: "POST",
                data: $('form').serialize(),
                dataType : "JSON",
                success: function(data)
                {
                    let html    = '';
                    $('#error').html(html);
                    if (data.error !== null){
                        html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                        $('#error').html(html);
                        Codebase.layout('header_loader_off')
                    }
                    else{
                        $('[name="loanInterest"]').val(data.interest);
                        $('[name="totalLoan"]').val(data.total);
                        $('[name="return"]').val(data.returns);
                        Codebase.layout('header_loader_off')
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                    Codebase.layout('header_loader_off')
                }
            });
        }
    });

    $(document).on('change','#loanPeriod',function (e){
        e.preventDefault();
        $.ajax({
            url : "<?php echo site_url('Base/loanInterest') ?>",
            type: "POST",
            data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                let html    = '';
                $('#error').html(html);
                if (data.error !== null){
                    html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                    $('#error').html(html);
                    Codebase.layout('header_loader_off')
                }
                else{
                    $('[name="loanInterest"]').val(data.interest);
                    $('[name="totalLoan"]').val(data.total);
                    $('[name="return"]').val(data.returns);
                    Codebase.layout('header_loader_off')
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                Codebase.layout('header_loader_off')
            }
        });
    });

    $(document).on('change','#startingDate',function () {
        let html = '';
        Codebase.layout('header_loader_on');
        $.ajax({
            url : "<?php echo site_url('Base/loanEnd') ?>",
            type: "POST",
            data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                $('#error').html(html);
                if (data.error != null){
                    html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                    $('#error').html(html);
                    $('[name="endingDate"]').val(null);

                    Codebase.layout('header_loader_off')
                }
                else{
                    $('[name="endingDate"]').val(data.endingDate);
                    $('#schedule').html(data.schedule);
                    Codebase.layout('header_loader_off')
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                Codebase.layout('header_loader_off')
            }
        });
    });

    $(document).on('change','.return',function () {
        let html = '';
        let return_id = ($(this).attr('return_id'));
        let amount 	= $(this).val();
        let idValue	=  (this.id);
        Codebase.layout('header_loader_on');
        $.ajax({
            url : "<?php echo site_url('Loans/loanReturn/') ?>"+amount+"/"+idValue,
            type: "POST",
            //data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                $('#error').html(html);
                if (data.error != null){
                    html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                    $('#error').html(html);
                    Codebase.layout('header_loader_off')
                }
                else{
                    returnCalculation(return_id);
                    Codebase.layout('header_loader_off')
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                Codebase.layout('header_loader_off')
            }
        });
    });

    function returnCalculation(return_id = null){
        $.ajax({
            url : "<?php echo site_url('Base/returnCalculation/') ?>"+return_id,
            type: "POST",
            //data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                $('#target').html(data.target);
                $('#collected').html(data.collected);
                $('#balance').html(data.balance);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                Codebase.layout('header_loader_off')
            }
        });
    }

    $(document).on('click','#processLoan',function (e) {
        e.preventDefault();
        let process = $(this).val();
        $.confirm({
            theme: 'supervan',
            title: 'Process Loan',
            content: 'You are about to process loan. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing loan',
                        content: 'Loan processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Base/loanEnd/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan processing is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'New loan',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans/request') ?>");
                                            }
                                        },
                                        btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        }
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#saveReturns',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('return_id'));
        $.confirm({
            theme: 'supervan',
            title: 'Process Returns',
            content: 'You are about to process returns. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing return',
                        content: 'Returns processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/processReturns/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Returns processing is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'New returns',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans/returns') ?>");
                                            }
                                        },
                                        btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        }
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#initialLoanReject',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('d'));
        $.confirm({
            theme: 'supervan',
            title: 'Reject Loan',
            content: 'You are about to reject loan. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing rejection',
                        content: 'Rejection processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/initialLoanReject/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan rejection is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'Refresh',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        },
                                        /*btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php //echo site_url('Loans') ?>");
                                            }
                                        }*/
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#initialLoanApprove',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('d'));
        $.confirm({
            theme: 'supervan',
            title: 'Approve Loan',
            content: 'You are about to approve loan. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing approval',
                        content: 'Approval processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/initialLoanApprove/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan approval is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'Refresh',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        },
                                        /*btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php //echo site_url('Loans') ?>");
                                            }
                                        }*/
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#initialReturnsReject',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('d'));
        $.confirm({
            theme: 'supervan',
            title: 'Reject Return',
            content: 'You are about to reject returns. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing rejection',
                        content: 'Rejection processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/initialReturnReject/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan rejection is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'Refresh',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans/returns') ?>");
                                            }
                                        },
                                        /*btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php //echo site_url('Loans') ?>");
                                            }
                                        }*/
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#initialReturnsApprove',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('d'));
        $.confirm({
            theme: 'supervan',
            title: 'Approve Return',
            content: 'You are about to approve loan. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing approval',
                        content: 'Approval processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/initialLoanApprove/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan approval is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'Refresh',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        },
                                        /*btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php //echo site_url('Loans') ?>");
                                            }
                                        }*/
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

	//Increment the idle time counter every minute.
	var idleInterval = setInterval(timerIncrement, 60000); // 1 minute
	idleTime = 0;
	//Zero the idle timer on mouse movement.
	$(this).mousemove(function (e) {
		idleTime = 0;
	});

	$(this).keypress(function (e) {
		idleTime = 0;
	});

	function timerIncrement() {
		idleTime = idleTime + 1;
		if (idleTime > 4) {
			window.location.assign("<?php echo site_url('Auth/lock') ?>");
		}
	}

</script>
</body>
</html>
