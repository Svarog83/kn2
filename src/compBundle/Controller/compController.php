<?php
namespace SDClasses\compBundle\Controller;
use SDClasses;
use SDClasses\AppConf;
use SDClasses\NoEscapeClass;
use SDClasses\User;
use SDClasses\Controller;

class compController extends Controller
{
	public function newAction()
	{
		$this->render( array( 'module' => 'comp', 'view' => 'new' ) );
	}

	public function testAction()
		{
			$this->render( array( 'module' => 'comp', 'view' => 'test' ) );
		}

	public function saveAction()
	{
		s ( $_FILES );
		s ( $_REQUEST );

		$AC = AppConf::getIns();
		ob_start();
		?>
			<script type="text/javascript">
			<!--
				$(document).ready(
					function()
					{
						alert ( 'cool script running after form is saved!')
					}
				);

			//-->
			</script>
		<?php
		$AC->ajax_return['script'] = SDClasses\Func::cleanScript ( ob_get_contents() );
		ob_end_clean();

		$AC->ajax_return['success'] = false;
		echo 'Форма еще не готова.';
	}
}