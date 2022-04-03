	<h2 class="content-heading">Statistics</h2>
		<div class="row gutters-tiny">
			<!-- Row #1 -->
			<div class="col-md-6 col-xl-3">
				<a class="block block-link-shadow text-right" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix">
						<div class="float-left mt-10">
							<i class="si si-arrow-down-circle fa-3x text-success"></i>
						</div>
						<div class="font-size-h3 font-w600"><?php if (isset($statistics)){ echo number_format($statistics['today_target'],2); } ?></div>
						<div class="font-size-sm font-w600 text-uppercase text-muted">Today Target</div>
					</div>
				</a>
			</div>
			<div class="col-md-6 col-xl-3">
				<a class="block block-link-shadow text-right" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix">
						<div class="float-left mt-10">
							<i class="si si-arrow-up-circle fa-3x text-danger"></i>
						</div>
						<div class="font-size-h3 font-w600"><?php if(isset($statistics)){ echo number_format($statistics['yesterday_target'],2); } ?></div>
						<div class="font-size-sm font-w600 text-uppercase text-muted">Yesterday Target</div>
					</div>
				</a>
			</div>
			<div class="col-md-6 col-xl-3">
				<a class="block block-link-shadow text-left" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix">
						<div class="float-right mt-10">
							<i class="si si-calendar fa-3x text-success"></i>
						</div>
						<div class="font-size-h3 font-w600"><?php if (isset($statistics)){ echo number_format($statistics['yesterday_collected'],2); } ?></div>
						<div class="font-size-sm font-w600 text-uppercase text-muted">Yesterday Collected</div>
					</div>
				</a>
			</div>
			<div class="col-md-6 col-xl-3">
				<a class="block block-link-shadow text-left" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix">
						<div class="float-right mt-10">
							<i class="si si-calendar fa-3x text-danger"></i>
						</div>
						<div class="font-size-h3 font-w600"><?php if (isset($statistics)){ echo number_format($statistics['yesterday_balance'],2); } ?></div>
						<div class="font-size-sm font-w600 text-uppercase text-muted">Yesterday Balance</div>
					</div>
				</a>
			</div>
			<!-- END Row #1 -->
		</div>

        <div class="row" data-toggle="appear">
            <!-- Row #1 -->
            <div class="col-6 col-xl-4">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-wallet fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600"><span data-toggle="countTo" data-speed="1000" data-to="<?php if (isset($incomplete)){ echo sizeof($incomplete); } ?>"><?php if (isset($incomplete)){ echo sizeof($incomplete); } ?></span></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Incomplete Loans</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-4">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-envelope-open fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?php if (isset($overdue)){ echo sizeof($overdue); } ?>"><?php if (isset($overdue)){ echo sizeof($overdue); } ?></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Overdue Loans</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-4">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-users fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?php if (isset($completed)){ echo sizeof($completed); } ?>"><?php if (isset($completed)){ echo sizeof($completed); } ?></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Completed Loans</div>
                    </div>
                </a>
            </div>
            <!-- END Row #1 -->
        </div>

		<div class="row">
					<div class="col-md-6">
						<div class="block">
							<div class="block-header">
								<h3 class="block-title">Today</h3>
							</div>
							<div class="block-content">
								<?php

								/* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
								include APPPATH.'views/common/fusioncharts.php';
								if (isset($todayChart)){
									$Chart = new FusionCharts("column3d", "chart-1" , "100%", "300", "chart-container-1", "json", $todayChart);

									// Render the chart
									$Chart->render();
								}
								?>
								<div id="chart-container-1">Chart will render here!</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="block">
							<div class="block-header">
								<h3 class="block-title">This Month</h3>
							</div>
							<div class="block-content">
								<?php

								/* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/

								if (isset($monthChart)){
									$Chart = new FusionCharts("bar3d", "chart-3" , "100%", "300", "chart-container-3", "json", $monthChart);

									// Render the chart
									$Chart->render();
								}
								?>
								<div id="chart-container-3">Chart will render here!</div>
							</div>
						</div>
					</div>
		</div>
        <div class="row gutters-tiny">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">Past 7 days</h3>
                    </div>
                    <div class="block-content">
                        <?php

                        /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/

                        if (isset($monthChart)){
                            $Chart = new FusionCharts("spline", "chart-4" , "100%", "300", "chart-container-4", "json", $pastSeven);

                            // Render the chart
                            $Chart->render();
                        }
                        ?>
                        <div id="chart-container-4">Chart will render here!</div>
                    </div>
                </div>
            </div>
        </div>

