<?php
include("panel-inc-header.php");
$oxcakmak->metaRobots(0);
$oxcakmak->metaTitle($lang['menu_blog'], STUCK);
include("panel-inc-menu.php");
$oxcakmak->checkSessionNotLogged();
$page = @intval($_GET['page']); if(!$page){ $page = 1; }
$totalDataCount = $dbh->getValue("thread", "COUNT(*)");
$pageLimit = 15;
$pageNumber = ceil($totalDataCount/$pageLimit); if($page > $pageNumber){ $page = 1;}
$viewData = $page * $pageLimit - $pageLimit;
$viewPerPage = 5;
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_blog'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_blog'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			<div class="col-lg-12">
				<div class="main-content-body d-flex flex-column">
					<div class="card p-4">
						
							<div><a class="btn btn-success pull-right mb-4" href="'.BASE_URL.'panel/blog/add">'.$lang['label_create_new_blog_post'].'</a></div>
							<div class="table-responsive">
								<table class="table table-bordered mg-b-0 text-md-nowrap">
									<thead>
										<tr>
											<th>ID</th>
											<th>'.$lang['table_title'].'</th>
											<th>'.$lang['table_description'].'</th>
											<th>'.$lang['table_owner'].'</th>
											<th>'.$lang['table_date'].'</th>
											<th>'.$lang['table_process'].'</th>
										</tr>
									</thead>
									<tbody>
									';
									$i = 0;
									$dbh->orderBy("thread_id", "DESC");
									foreach($dbh->rawQuery('SELECT * FROM thread ORDER BY thread_id DESC LIMIT ?, ?', [$viewData, $pageLimit]) as $queryThreadRow){
										$i++;
										echo '
										<tr class="tx-13">
											<th scope="row">'.$i.'</th>
											<td>'.$queryThreadRow['thread_title'].'</td>
											<td>'.$queryThreadRow['thread_description'].'</td>
											<td>'.$queryThreadRow['thread_owner'].'</td>
											<td>'.$queryThreadRow['thread_date'].'</td>
											<td class="tx-bold"><span onclick="window.open(\''.BASE_URL.'panel/blog/edit?thread='.$queryThreadRow['thread_slug'].'\', \'_self\');" style="cursor:pointer;" id="edit">'.$lang['label_edit'].'</span>&nbsp;/&nbsp;<span onclick="removeBlogPost(\''.$queryThreadRow['thread_slug'].'\');" id="remove" style="cursor:pointer;">'.$lang['label_remove'].'</span></td>
										</tr>
										';
									}
										echo '
									</tbody>
								</table>
							</div>
							
							<div class="row row-sm mt-4">
								<div class="dataTables_paginate">
									<ul class="pagination justify-content-center">
									';
									if($page > 1){ 
										echo '
										<li class="paginate_button page-item previous"><a href="'.BASE_URL.'panel/blog?page=1" class="page-link"><i class="fa fa-angle-double-left"></i></a></li>
										<li class="paginate_button page-item"><a href="'.BASE_URL.'panel/blog?page='.($page - 1).'" class="page-link"><i class="fa fa-angle-left"></i></a></li>
										';
									}
									for($i = $page - $viewPerPage; $i < $page + $viewPerPage +1; $i++){ 
										if($i > 0 && $i <= $pageNumber){
											if($i == $page){
												echo '<li class="paginate_button page-item active"><a href="'.BASE_URL.'panel/blog?page='.$i.'" class="page-link">'.$i.'</a></li>';
											}else{
												echo '<li class="paginate_button page-item"><a href="'.BASE_URL.'panel/blog?page='.$i.'" class="page-link">'.$i.'</a></li>';
											}
										}
									}
									if($page != $pageNumber){
										echo '
										<li class="paginate_button page-item"><a href="'.BASE_URL.'panel/blog?page='.($page + 1).'" class="page-link"><i class="fa fa-angle-right"></i></a></li>
										<li class="paginate_button page-item next"><a href="'.BASE_URL.'panel/blog?page='.$pageNumber.'" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
										';
									}
									echo '
									</ul>
								</div>
							</div>
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
function removeBlogPost(slug){
	$("#remove").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {slug:slug,actionRemoveThread:"actionRemoveThread"},
		success: function(response){
			if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_thread_remove_not_found'].'", "'.$lang['label_alert_title_danger'].'", "error");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_thread_remove_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
</script>
';
include("inc-end.php");
?>