<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_portfolio'], STUCK);
include("panel-inc-menu.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("/banned"); }
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_portfolio'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_portfolio'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			<div class="col-lg-12">
			';
			$dbh->orderBy("portfolio_id", "ASC");
			$queryPortfolioList = $dbh->get("portfolio");
			echo '
				<div class="main-content-body d-flex flex-column">
					<div class="card p-4">
						<div><button class="btn btn-success mb-4" data-target="#addPortfolioModal" data-toggle="modal">'.$lang['label_create_new_portfolio_item'].'</button></div>
						<div class="modal" id="addPortfolioModal">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="modal-title">'.$lang['label_create_new_portfolio_item'].'</h6>
										<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_picture'].'</label>
											<input class="form-control rounded" type="text" placeholder="assets/upload/portfolio/portfolio.jpg" id="portfolioPicture" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
											<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="portfolioTitle" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_category'].'</label>
											<select class="form-control rounded" type="text" placeholder="'.$lang['label_category'].'" id="portfolioCategory">
												<option value="" selected>'.$lang['label_select'].'</option>
												';  $dbh->orderBy("category_slug", "ASC"); foreach($dbh->get("category") as $catRow){ echo '<option value="'.$catRow['category_slug'].'">'.$catRow['category_title'].'</option>'; } echo '
											</select>
										</div>
									</div>
									<div class="modal-footer justify-content-right">
										<button class="btn btn-success" type="button" id="actionAddPortfolio">'.$lang['button_send'].'</button>
										<button class="btn btn-danger" data-dismiss="modal" type="button">'.$lang['button_cancel'].'</button>
									</div>
								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table table-bordered mg-b-0 text-md-nowrap">
								<thead>
									<tr>
										<th>ID</th>
										<th>'.$lang['table_title'].'</th>
										<th>'.$lang['table_management'].'</th>
									</tr>
								</thead>
								<tbody>
								';
								$i=0;
								foreach($queryPortfolioList as $pRow){
									$i++;
									echo '
										<tr>
											<th scope="row">'.$i.'</th>
											<td>'.$pRow['portfolio_title'].'</td>
											<td><b style="cursor:pointer;" onclick="deletePortfolio(\''.$pRow['portfolio_hash'].'\');" id="delete">'.$lang['label_delete'].'</b></td>
										</tr>
									';
								}									
									echo '
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Main Content-->
';
include("panel-inc-footer.php");
echo '
<script>
function deletePortfolio(hash){
	$("#delete").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {portfolioHash:hash,actionDeletePortfolio:"actionDeletePortfolio"},
		success: function(response){
			if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_portfolio_delete_not_found'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_portfolio_delete_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#delete").attr("disabled", true);
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
$("#actionAddPortfolio").click(function(e){
	e.preventDefault();
	$("#actionAddPortfolio").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {portfolioPicture:$("#portfolioPicture").val(), portfolioTitle:$("#portfolioTitle").val(), portfolioCategory:$("#portfolioCategory").val(), actionAddPortfolio:"actionAddPortfolio"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddPortfolio").attr("disabled", false);
			}else if($.trim(response) == "exists"){
				shortToast("'.$lang['message_portfolio_add_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddPortfolio").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_portfolio_add_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#categoryTitle").val("");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>