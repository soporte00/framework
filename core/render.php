<?php namespace core;

class render{
	private static $i;
	private $mssg=null,$statusCode;


    public static function view(string $path){
        return $path;
    }


	/**
	 * json
	 *
	 * @param  int $code '200 - 404 - 503 etc'
	 * @example - "render::json(404)->message('Not found')->out()"
	 * @example - '{
	 * 		"status" : 404,
	 * 		"message" : "Not found",
	 * 		"content" : {"mainData":"data"}
	 * }'
	 */
	public static function json(int $code = 200)
	{

		if (!self::$i instanceof self) {
			self::$i = new self;
		}

		self::$i->statusCode = $code;

		http_response_code($code);

		return self::$i;
	}
	
	/**
	 * message
	 *
	 * @param  string|null|bool $mssg
	 * @example - "render::json(404)->message('Not found')->out()"
	 * @example - '{
	 * 		"status" : 404,
	 * 		"message" : "Not found",
	 * 		"content" : {"mainData":"data"}
	 * }'
	 */
	public function message($mssg)
	{
		$this->mssg = $mssg;
		return $this;
	}


	
	/**
	 * out
	 *
	 * @param  mixed $response
	 * @example - "render::json(404)->message('Not found')->out(['mainData'=>'data'])"
	 * @example - '{
	 * 		"status" : 404,
	 * 		"message" : "Not found",
	 * 		"content" : {"mainData":"data"}
	 * }'
	 */
	public function out($response = false)
	{

		$r = [
			"status" => $this->statusCode,
			"message" => $this->mssg,
			"content" => $response
		];

		header('Content-Type: application/json');

		echo json_encode($r);
		die();
	}

}