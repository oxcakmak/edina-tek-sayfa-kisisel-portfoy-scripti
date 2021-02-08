<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_category'], STUCK);
include("panel-inc-menu.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("/banned"); }
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_category'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_category'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			<div class="col-lg-12">
			';
			$dbh->orderBy("category_id", "ASC");
			$queryCategoryList = $dbh->get("category");
			echo '
				<div class="main-content-body d-flex flex-column">
					<div class="card p-4">
						<div><button class="btn btn-success mb-4" data-target="#addCategoryModal" data-toggle="modal">'.$lang['label_create_new_category_item'].'</button></div>
						<div class="modal" id="addCategoryModal">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="modal-title">'.$lang['label_create_new_category_item'].'</h6>
										<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
									</div>
									<div class="modal-body">
										<div class="form-group">
										  <label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
										  <input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="categoryTitle" />
										</div>
									</div>
									<div class="modal-footer justify-content-right">
										<button class="btn btn-success" type="button" id="actionAddCategory">'.$lang['button_send'].'</button>
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
										<th>'.$lang['table_content'].'</th>
										<th>'.$lang['table_management'].'</th>
									</tr>
								</thead>
								<tbody>
								';
								$i=0;
								foreach($queryCategoryList as $cRow){
									$i++;
									echo '
										<tr>
											<th scope="row">'.$i.'</th>
											<td>'.$cRow['category_slug'].'</td>
											<td>'.$cRow['category_title'].'</td>
											<td><b style="cursor:pointer;" onclick="deleteCategory(\''.$cRow['category_slug'].'\');" id="delete">'.$lang['label_delete'].'</b></td>
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
function deleteCategory(hash){
	$("#delete").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {categorySlug:hash,actionDeleteCategory:"actionDeleteCategory"},
		success: function(response){
			if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_category_delete_not_found'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_category_delete_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#delete").attr("disabled", true);
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
$("#actionAddCategory").click(function(e){
	e.preventDefault();
	$("#actionAddCategory").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {categoryTitle:$("#categoryTitle").val(), actionAddCategory:"actionAddCategory"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddCategory").attr("disabled", false);
			}else if($.trim(response) == "exists"){
				shortToast("'.$lang['message_category_add_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddCategory").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_category_add_success'].'", "'.$lang['label_alert_title_success'].'", "success");
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