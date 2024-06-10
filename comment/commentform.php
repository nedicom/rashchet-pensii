<?php
		echo '	<div class="row d-flex justify-content-center mt-5">
						<div class="col-md-8 col-lg-6">
							<div class="card shadow-0 border" style="background-color: #f0f2f5;">';
				
					$result_set = $con->query("SELECT * FROM `comments`"); //Вытаскиваем все комментарии для данной страницы
					  while ($row = $result_set->fetch_assoc()) {
						  
						  
						         echo ' <div class="card mb-4">
									  <div class="card-body">
										<p>'.$row["text_comment"].'</p>

										<div class="d-flex justify-content-between">
										  <div class="d-flex flex-row align-items-center">
											<img src="https://avatars.yandex.net/get-yapic/'.$row["default_avatar_id"].'/islands-34" alt="avatar" width="25"
											  height="25" />
											<p class="small mb-0 ms-2">'.$row["display_name"].'</p>
										  </div>
										  <div class="d-flex flex-row align-items-center">
											<p class="small text-muted mb-0">Поднять вопрос (пока недоступно)?</p>
											<i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
											<p class="small text-muted mb-0">3</p>
										  </div>
										</div>
									  </div>
									</div>';
		
		
						 //Вывод комментариев
						echo "<br />";
					  }
				
			echo '  </div>
						</div>
							</div>';
							
							if(empty($_SESSION['client_id'])){
								echo '<form name="comment" action="comment/comment.php" method="post">				
									<div class="mb-3 container">
										<label for="commenttext" class="form-label">Ваш вопрос / комментарий</label>
										<textarea class="form-control" id="textcomment" name="textcomment" rows="3" placeholder="Чтобы оставить комментарий нужно войти на сайт" disabled></textarea>
										<input type="submit" class="btn btn-primary my-3" value="Отправить" disabled/>
										<a href="' . $urlmenu . '" class="d-inline-flex m-1 btn btn-primary btn-lg d-flex" role="button">Войти</a>
									</div>
								</form>';
								
							}
							else{
								
								echo '<form name="comment" action="comment/comment.php" method="post">				
									<div class="mb-3 container">
										<label for="commenttext" class="form-label">Ваш вопрос / комментарий</label>
										<textarea class="form-control" id="textcomment" name="textcomment" rows="3"></textarea>
										<input type="submit" class="btn btn-primary my-3" value="Отправить" />	
										</div>
								</form>';
									
							}
				

?>