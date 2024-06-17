<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>

        <div class="content-wrapper">
            <div class="container">

                <!-- Main content -->

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <?php
				        if(isset($_SESSION['error'])){
				        	?>
                        <div class="alert alert-danger alert-dismissible">
                            <button
                                type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-hidden="true"
                            >&times;</button>
                            <ul>
                                <?php
					        			foreach($_SESSION['error'] as $error){
					        				echo "
					        					<li>".$error."</li>
					        				";
					        			}
					        		?>
                            </ul>
                        </div>
                        <?php
				         	unset($_SESSION['error']);

				        }
				        if(isset($_SESSION['success'])){
				          	echo "
				            	<div class='alert alert-success alert-dismissible'>
				              		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				              		<h4><i class='icon fa fa-check'></i> Success!</h4>
				              	".$_SESSION['success']."
				            	</div>
				          	";
				          	unset($_SESSION['success']);
				        }

				    ?>

                        <div
                            class="alert alert-danger alert-dismissible"
                            id="alert"
                            style="display:none;"
                        >
                            <button
                                type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-hidden="true"
                            >&times;</button>
                            <span class="message"></span>
                        </div>

                        <?php
				    	$sql = "SELECT * FROM votes WHERE voters_id = '".$voter['id']."'";
				    	$vquery = $conn->query($sql);
				    	if($vquery->num_rows > 0){
				    		?>
                        <div class="text-center">
                            <h3>Bạn đã bỏ phiếu.</h3>
                            <a
                                href="#view"
                                data-toggle="modal"
                                class="btn btn-flat btn-primary btn-lg"
                            >Xem phiếu bầu</a>
                        </div>
                        <?php
				    	}
				    	else{
				    		?>
                        <!-- Voting Ballot -->
                        <form
                            method="POST"
                            id="ballotForm"
                            action="submit_ballot.php"
                        >
                            <?php
				        			include 'includes/slugify.php';

				        			$candidate = '';
				        			$sql = "SELECT * FROM positions ORDER BY priority ASC";
									$query = $conn->query($sql);
									while($row = $query->fetch_assoc()){
										$sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
										$cquery = $conn->query($sql);
										while($crow = $cquery->fetch_assoc()){
											$slug = slugify($row['description']);
											$checked = '';
											if(isset($_SESSION['post'][$slug])){
												$value = $_SESSION['post'][$slug];

												if(is_array($value)){
													foreach($value as $val){
														if($val == $crow['id']){
															$checked = 'checked';
														}
													}
												}
												else{
													if($value == $crow['id']){
														$checked = 'checked';
													}
												}
											}
											$input = ($row['max_vote'] > 1) ? '<input type="checkbox" class="flat-red '.$slug.'" name="'.$slug."[]".'" value="'.$crow['id'].'" '.$checked.'>' : '<input type="radio" class="flat-red '.$slug.'" name="'.slugify($row['description']).'" value="'.$crow['id'].'" '.$checked.'>';
											$image = (!empty($crow['photo'])) ? 'images/'.$crow['photo'] : 'images/profile.jpg';
											$candidate .= '
												<li>
													'.$input.'<img src="'.$image.'" height="100px" width="100px" class="clist"><span class="cname clist">'.$crow['firstname'].' '.$crow['lastname'].'</span>
												</li>
											';
										}

										$instruct = ($row['max_vote'] > 1) ? 'Bạn có thể chọn đến '.$row['max_vote'].' ứng cử viên' : 'Chọn duy nhất 1 ứng cử viên';

										echo '
											<div class="row">
												<div class="col-xs-12">
													<div class="box box-solid" id="'.$row['id'].'">
														<div class="box-header with-border">
															<h3 class="box-title"><b>'.$row['description'].'</b></h3>
														</div>
														<div class="box-body">
															<p>'.$instruct.'
																<span class="pull-right">
																	<button type="button" class="btn btn-success btn-sm btn-flat reset" data-desc="'.slugify($row['description']).'"><i class="fa fa-refresh"></i> Reset</button>
																</span>
															</p>
															<div id="candidate_list">
																<ul>
																	'.$candidate.'
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										';

										$candidate = '';

									}	

				        		?>
                            <div class="text-center">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-flat"
                                    name="vote"
                                ><i class="fa fa-check-square-o"></i> Nộp phiếu</button>
                            </div>
                            <!-- End Voting Ballot -->
                            <?php
				    	}

				    ?>

                    </div>
                </div>
                </section>

            </div>
        </div>

        <?php include 'includes/ballot_modal.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
    $(function() {
        $('.content').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $(document).on('click', '.reset', function(e) {
            e.preventDefault();
            var desc = $(this).data('desc');
            $('.' + desc).iCheck('uncheck');
        });

    });

    // function validateForm() {
    //     var valid = true;
    //     var positions = document.querySelectorAll('.box.box-solid');
    //     positions.forEach(function(position) {
    //         var inputs = position.querySelectorAll(
    //             'input[type="radio"]:checked, input[type="checkbox"]:checked');
    //         if (inputs.length === 0) {
    //             valid = false;
    //             alert('Bạn phải chọn ít nhất một ứng viên cho vị trí ' + position.querySelector('.box-title')
    //                 .innerText);
    //         }
    //     });
    //     return valid;
    // };
    </script>
</body>

</html>