<?php

class BaseController extends Controller {

	// public function response(int $errCode, string $message)
	// {
	// 	return Response::json(array('errCode'=>$errCode, 'message'=>$message));
	// }





	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
