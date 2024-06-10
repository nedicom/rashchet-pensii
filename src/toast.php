<?php						
		if($_COOKIE['policy'] !== '1'){
			echo '<div class="toast-container position-fixed m-2 bottom-0 end-0">		
					<div class="toast show">					
						<div class="toast-header">
							<i class="fa-solid fa-calculator"></i>
								<strong class="me-auto mx-3">Мы используем cookie</strong>
									<a class="link-secondary" href="\non-disclosure policy.php" target ="_blank">Подробнее</a>
									<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
						</div>					
					</div>
				</div>';
		}
?>
	
